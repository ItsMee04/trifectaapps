<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseSuplierModel extends Model
{
    use HasFactory;
    protected $table = 'purchasesuplier';
    protected $fillable = [
        'id',
        'idpurchase',
        'supplier',
        'codeproduct',
        'productname',
        'weightproduct',
        'caratproduct',
        'purchaseprice',
        'purchasedate',
        'conditionproduct',
        'explanation',
        'photoproduct',
        'typeproduct',
        'categoriesproduct',
        'status',
    ];
}
