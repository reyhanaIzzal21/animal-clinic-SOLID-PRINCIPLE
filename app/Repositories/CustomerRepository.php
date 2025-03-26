<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function getAll(): Collection
    {
        return Customer::orderByDesc('id')->get();
    }

    public function findById(int $id): ?Customer
    {
        return Customer::find($id);
    }

    public function create(array $data): Customer
    {
        return Customer::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $customer = Customer::find($id);
        return $customer ? $customer->update($data) : false;
    }

    public function delete(int $id): bool
    {
        $customer = Customer::find($id);
        return $customer ? $customer->delete() : false;
    }
}
