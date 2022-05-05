<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    /**
     * Summary of fillable
     * @var mixed
     */
    protected $fillable = [
        'title', 'detail'
    ];
}
