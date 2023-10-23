<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    public function appointment_type()
    {
        return $this->belongsTo(AppointmentType::class);
    }
}
