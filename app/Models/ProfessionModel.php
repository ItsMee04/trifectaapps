<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfessionModel extends Model
{
    use HasFactory;
    protected $table = 'profession';
    protected $fillable = [
        'id',
        'profession',
        'status'
    ];
}
