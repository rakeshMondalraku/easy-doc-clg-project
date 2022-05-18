<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    public function patients()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctors()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function availabilities()
    {
        return $this->belongsTo(Availability::class);
    }
}
