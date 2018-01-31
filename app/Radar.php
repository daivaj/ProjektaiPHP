<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Radar extends Model
{
    use SoftDeletes;
    
    protected $table = 'radars';

    protected $primaryKey = 'id';
    protected $foreignKey = 'id';
    
    protected $fillable = ['date', 'number', 'distance', 'time', 'speed', 'deleted_at', 'driver_id'];

    public function drivers()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'driver_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
