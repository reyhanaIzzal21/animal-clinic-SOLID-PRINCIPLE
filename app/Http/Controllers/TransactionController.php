<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;
use App\Models\Doctor;
use App\Models\Customer;
use App\Models\Pet;
use App\Models\Service;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index()
    {
        $transactions = $this->transactionService->getAllTransactions();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Menampilkan halaman form create transaksi
     */
    public function create()
    {
        $doctors = Doctor::whereDoesntHave('transactions', function ($query) {
            $query->where('status', 'pending');
        })->get();

        $customers = Customer::all();
        $services = Service::all(); // Pastikan ini ada

        return view('transactions.create', compact('doctors', 'customers', 'services'));
    }

    /**
     * Menyimpan transaksi baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'customer_id' => 'required|exists:customers,id',
            'pets' => 'required|array',
            'pets.*' => 'exists:pets,id',
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
        ]);

        $transactionData = $request->only(['doctor_id', 'customer_id', 'pets', 'services']);
        $transaction = $this->transactionService->createTransaction($transactionData);

        return redirect()->route('transactions.index', $transaction->id)->with('success', 'Berhasil menambahkan transaksi baru!');
    }

    /**
     * Menampilkan detail transaksi
     */
    public function show($id)
    {
        $transaction = $this->transactionService->getTransactionById($id);
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Mengubah status transaksi
     */
    public function updateStatus($id, $status, Request $request)
    {
        $transaction = $this->transactionService->updateStatus($id, $status);
        return redirect()->route('transactions.index', $transaction->id)->with('success', 'Transaksi sudah selesai');
    }

    public function getPetsByCustomer($customerId)
    {
        $customer = Customer::with('pets')->findOrFail($customerId);
        return response()->json(['pets' => $customer->pets]);
    }

    public function getServicesByPets(Request $request)
    {
        $petIds = $request->input('pet_ids', []);
        $services = Service::whereHas('pets', function ($query) use ($petIds) {
            $query->whereIn('pets.id', $petIds);
        })->get();

        return response()->json(['services' => $services]);
    }
}
