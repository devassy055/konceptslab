<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model

{
    public $timestamps = false;
    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }

    use HasFactory;
}
