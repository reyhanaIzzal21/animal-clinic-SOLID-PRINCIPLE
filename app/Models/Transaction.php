<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'doctor_id',
        'customer_id',
        'total_price',
        'status',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function pets()
    {
        return $this->belongsToMany(Pet::class, 'transaction_pets');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'transaction_service');
    }
}
