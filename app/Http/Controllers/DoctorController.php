<?php

namespace App\Http\Controllers;

use App\Services\DoctorService;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    protected $doctorService;

    public function __construct(DoctorService $doctorService)
    {
        $this->doctorService = $doctorService;
    }

    public function index()
    {
        $doctors = $this->doctorService->getAllDoctors();
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'specialization' => 'required|string',
            'phone' => 'required|string',
        ]);

        $this->doctorService->createDoctor($request->all());
        return redirect()->route('doctors.index')->with('success', 'Dokter berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $doctor = $this->doctorService->getDoctorById($id);
        return view('doctors.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'specialization' => 'required|string',
            'phone' => 'required|string',
        ]);

        $this->doctorService->updateDoctor($id, $request->all());
        return redirect()->route('doctors.index')->with('success', 'Dokter berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $this->doctorService->deleteDoctor($id);
        return redirect()->route('doctors.index')->with('success', 'Dokter berhasil dihapus.');
    }
}
