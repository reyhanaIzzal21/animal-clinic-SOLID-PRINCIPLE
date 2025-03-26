<?php

namespace App\Repositories;

use App\Models\Doctor;
use App\Repositories\Interfaces\DoctorRepositoryInterface;

class DoctorRepository implements DoctorRepositoryInterface
{
    public function getAllDoctors()
    {
        return Doctor::orderByDesc('id')->get();
    }

    public function createDoctor(array $data)
    {
        return Doctor::create($data);
    }

    public function findDoctorById($id)
    {
        return Doctor::findOrFail($id);
    }

    public function updateDoctor($id, array $data)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->update($data);
        return $doctor;
    }

    public function deleteDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
    }
}
