<?php

namespace App\Repositories\Interfaces;

use App\Models\Doctor;

interface DoctorRepositoryInterface
{
    public function getAllDoctors();
    public function createDoctor(array $data);
    public function findDoctorById($id);
    public function updateDoctor($id, array $data);
    public function deleteDoctor($id);
}
