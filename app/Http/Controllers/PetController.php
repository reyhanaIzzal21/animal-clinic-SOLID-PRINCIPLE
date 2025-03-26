<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Customer;
use App\Services\PetService;
use Illuminate\Http\Request;

class PetController extends Controller
{
    protected $petService;

    public function __construct(PetService $petService)
    {
        $this->petService = $petService;
    }

    public function index()
    {
        $pets = $this->petService->getAllPets();
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('pets.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'name' => 'required|string',
            'species' => 'required|string',
            'age' => 'required|integer',
        ]);

        $this->petService->createPet($request->all());
        return redirect()->route('pets.index')->with('success', 'Hewan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pet = $this->petService->getPetById($id);
        $customers = Customer::all();
        return view('pets.edit', compact('pet', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'name' => 'required|string',
            'species' => 'required|string',
            'age' => 'required|integer',
        ]);

        $this->petService->updatePet($id, $request->all());
        return redirect()->route('pets.index')->with('success', 'Hewan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $this->petService->deletePet($id);
        return redirect()->route('pets.index')->with('success', 'Hewan berhasil dihapus.');
    }
}
