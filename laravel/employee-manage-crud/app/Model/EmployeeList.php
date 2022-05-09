<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeList extends Model
{
    use SoftDeletes;
    /**
     * Summary of 
     * @var mixed
     */
    protected $fillable = ["fullname", "nickname", "gender", "dob", "phone", "email"];
}
