<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /** @use HasFactory<\Database\Factories\SaleFactory> */
    use HasFactory;
    protected $table = 'sales';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'sale_date',
        'total_amount',
        'status',
        'payment_method',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'sale_date' => 'datetime',
        'total_amount' => 'decimal:2',
        'status' => 'string',
    ];

    /**
     * Get the customer associated with the sale.
     */
    public function customer()
    {
        return $this->belongsTo(Costumor::class);
    }
}
