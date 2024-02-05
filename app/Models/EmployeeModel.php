<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EmployeeModel extends Model
{
    use HasFactory;
    protected $table = 'employee';
    protected $fillable = [
        'id',
        'employeename',
        'employeeaddress',
        'employeecontact',
        'employeeprofession',
        'employeesignature',
        'employeeavatar',
        'status',
    ];

    public function profession(): HasOne
    {
        return $this->hasOne(ProfessionModel::class);
    }
}
