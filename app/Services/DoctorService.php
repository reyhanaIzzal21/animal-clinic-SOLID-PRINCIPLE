<?php

namespace App\Services;

use App\Repositories\Interfaces\DoctorRepositoryInterface;

class DoctorService
{
    protected $doctorRepository;

    public function __construct(DoctorRepositoryInterface $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }

    public function getAllDoctors()
    {
        return $this->doctorRepository->getAllDoctors();
    }

    public function createDoctor(array $data)
    {
        return $this->doctorRepository->createDoctor($data);
    }

    public function getDoctorById($id)
    {
        return $this->doctorRepository->findDoctorById($id);
    }

    public function updateDoctor($id, array $data)
    {
        return $this->doctorRepository->updateDoctor($id, $data);
    }

    public function deleteDoctor($id)
    {
        return $this->doctorRepository->deleteDoctor($id);
    }
}
