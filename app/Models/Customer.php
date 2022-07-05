<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
        'name',
        'address',
        'phone_number'
    ];


    /**
     * Get all of the buy for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buy()
    {
        return $this->hasMany(Buy::class, 'customer_id', 'id');
    }
}
