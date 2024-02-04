<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeproductModel extends Model
{
    use HasFactory;
    protected $table = 'typeproduct';
    protected $fillable = [
        'id',
        'type',
        'status'
    ];
}
