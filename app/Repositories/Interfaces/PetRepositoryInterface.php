<?php

namespace App\Repositories\Interfaces;

use App\Models\Pet;

interface PetRepositoryInterface
{
    public function getAllPets();
    public function createPet(array $data);
    public function findPetById($id);
    public function updatePet($id, array $data);
    public function deletePet($id);
}
