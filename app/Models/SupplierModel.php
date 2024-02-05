<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $fillable = [
        'id',
        'suppliername',
        'supplieraddress',
        'suppliercontact',
        'status'
    ];
}
