<?php

namespace App\Repositories;

use App\Models\Pet;
use App\Repositories\Interfaces\PetRepositoryInterface;

class PetRepository implements PetRepositoryInterface
{
    public function getAllPets()
    {
        return Pet::orderByDesc('id')->get(); // Hapus with('services')
    }

    public function createPet(array $data)
    {
        return Pet::create($data); // Hapus attach services
    }

    public function findPetById($id)
    {
        return Pet::findOrFail($id); // Hapus with('services')
    }

    public function updatePet($id, array $data)
    {
        $pet = Pet::findOrFail($id);
        $pet->update($data);
        return $pet; // Hapus sync services
    }

    public function deletePet($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete(); // Hapus detach services
    }
}
