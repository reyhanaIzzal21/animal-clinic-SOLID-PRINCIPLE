<?php

namespace App\Repositories\Interfaces;

use App\Models\Transaction;

interface TransactionRepositoryInterface
{
    public function getAll();
    public function createTransaction(array $data);
    public function getTransactionById($id);
    public function getAllTransactions();
    public function updateTransactionStatus($id, $status);
}
