<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseModel extends Model
{
    use HasFactory;
    protected $table = 'purchase';
    protected $fillable = [
        'id',
        'idpurchase',
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
