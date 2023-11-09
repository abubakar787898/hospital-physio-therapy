<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;
    protected $fillable = ['appointment_type_id', 'from_time','to_time','date','price'];
    public function appointment_type()
    {
        return $this->belongsTo(AppointmentType::class);
    }

}
