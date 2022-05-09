<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeSalary extends Model
{
    use SoftDeletes;
    /**
     * Summary of 
     * @var mixed
     */
    protected $fillable = ["empID","salary", "position", "department", "skyID"];
}
