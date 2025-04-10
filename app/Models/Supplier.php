<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /** @use HasFactory<\Database\Factories\SupplierFactory> */
    use HasFactory;

    protected $fillable = [
        'supplier_name',
        'primary_contact_name',
        'email',
        'phone',
        'address',
        'city',
        'country',
        'is_active',
    ];
}
