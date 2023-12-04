<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PatientBooking extends Model
{
    use HasFactory, Notifiable;

    public const ONLINE = 'online';
    public const COS = 'cos';

    public function duration()
    {
        return $this->belongsTo(Duration::class);
    }
    public function appointment_type()
    {
        return $this->belongsTo(AppointmentType::class);
    }
    public function service()
    {
        return $this->belongsTo(Services::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
  
}
