<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
    ];

    public function pets()
    {
        return $this->hasMany(pet::class);
    }

    public function transactions()
    {
        return $this->hasMany(transaction::class);
    }
}
