<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Driver extends Model
{
    use SoftDeletes;

    protected $table = 'drivers';

    protected $primaryKey = 'driver_id';
    protected $foreignKey = 'driver_id';

    protected $fillable = ['driver_id', 'name', 'city'];
    
    public function radars()
    {
        return $this->hasMany(Radar::class, 'driver_id', 'driver_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
