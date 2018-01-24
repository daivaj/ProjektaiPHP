<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use SoftDeletes;

    protected $table = 'drivers';

    protected $fillable = ['name', 'city', 'deleted_at'];
}
