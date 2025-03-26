<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\Interfaces\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function getAll()
    {
        return Transaction::orderByDesc('id')->get();
    }

    public function createTransaction(array $data)
    {
        return Transaction::create($data);
    }

    public function getTransactionById($id)
    {
        return Transaction::findOrFail($id);
    }

    public function getAllTransactions()
    {
        return Transaction::with('doctor', 'customer', 'pets')->get();
    }

    public function updateTransactionStatus($id, $status)
    {
        $transaction = Transaction::findOrFail($id)->update(['status' => $status]);
        return $transaction;
    }
}
