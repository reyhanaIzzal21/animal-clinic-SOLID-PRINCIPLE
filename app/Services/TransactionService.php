<?php

namespace App\Services;

use App\Models\Pet;
use App\Models\Service;
use App\Models\Transaction;
use App\Repositories\Interfaces\TransactionRepositoryInterface;

class TransactionService
{
    protected $transactionRepository;

    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function getAllTransactions()
    {
        return $this->transactionRepository->getAll();
    }

    /**
     * Membuat transaksi baru
     */
    public function createTransaction(array $data)
    {
        // Hitung total harga berdasarkan hewan dan layanan yang dipilih
        $totalPrice = $this->calculateTotalPrice($data['pets'], $data['services']);

        // Simpan transaksi
        $transaction = $this->transactionRepository->createTransaction([
            'doctor_id' => $data['doctor_id'],
            'customer_id' => $data['customer_id'],
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        // Simpan relasi many-to-many ke tabel pivot
        $transaction->pets()->attach($data['pets']);
        $transaction->services()->attach($data['services']);

        return $transaction;
    }


    /**
     * Menghitung total harga berdasarkan hewan dan layanan
     */
    public function calculateTotalPrice(array $petIds, array $serviceIds)
    {
        $totalPets = count($petIds); // Hitung jumlah hewan yang dipilih

        $totalPrice = Service::whereIn('id', $serviceIds)->sum('price'); // Hitung total harga layanan

        return $totalPrice * $totalPets; // Kalikan dengan jumlah hewan
    }

    public function getTransactionById($id)
    {
        return Transaction::with(['customer', 'doctor', 'pets', 'services'])->findOrFail($id);
    }

    /**
     * Mengupdate status transaksi
     */
    public function updateStatus($id, $status)
    {
        return $this->transactionRepository->updateTransactionStatus($id, $status);
    }
}
