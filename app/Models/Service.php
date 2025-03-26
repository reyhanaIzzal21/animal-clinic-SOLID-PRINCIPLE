<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    // public function pets()
    // {
    //     return $this->belongsToMany(Pet::class, 'pet_services');
    // }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class, 'transaction_service');
    }
}
