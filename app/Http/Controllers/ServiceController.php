<?php

namespace App\Http\Controllers;

use App\Services\ServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function index()
    {
        $services = $this->serviceService->getAllServices();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $this->serviceService->createService($request->all());
        return redirect()->route('services.index')->with('success', 'Service berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $service = $this->serviceService->getServiceById($id);
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $this->serviceService->updateService($id, $request->all());
        return redirect()->route('services.index')->with('success', 'Service berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $this->serviceService->deleteService($id);
        return redirect()->route('services.index')->with('success', 'Service berhasil dihapus.');
    }
}
