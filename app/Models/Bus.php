<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    public $timestamps = false;

    public function routes()
    {
        return $this->belongsTo(Route::class, 'route_id');
    }


    use HasFactory;
}
