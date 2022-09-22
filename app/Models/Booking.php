<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model

{ public $timestamps = false;
    public function bus()
    {
        return $this->belongsTo(Bus::class, 'buesid');
    }
    use HasFactory;
}
