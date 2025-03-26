<?php

namespace App\Services;

use App\Repositories\Interfaces\PetRepositoryInterface;

class PetService
{
    protected $petRepository;

    public function __construct(PetRepositoryInterface $petRepository)
    {
        $this->petRepository = $petRepository;
    }

    public function getAllPets()
    {
        return $this->petRepository->getAllPets();
    }

    public function createPet(array $data)
    {
        return $this->petRepository->createPet($data);
    }

    public function getPetById($id)
    {
        return $this->petRepository->findPetById($id);
    }

    public function updatePet($id, array $data)
    {
        return $this->petRepository->updatePet($id, $data);
    }

    public function deletePet($id)
    {
        return $this->petRepository->deletePet($id);
    }
}
