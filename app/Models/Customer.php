<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'country',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone' => 'string',
        'address' => 'string',
        'city' => 'string',
        'country' => 'string',
    ];  
    /**
     * Get the sales associated with the customer.
     */
    public function sales() 
    {
        return $this->hasMany(Sale::class);
    }
    /**
     * Get the orders associated with the customer.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
}
