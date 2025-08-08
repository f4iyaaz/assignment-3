<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointment';
    protected $fillable = ['name', 'address', 'phone', 'car_license_number', 'car_engine_number', 'appointment_date', 'mechanic_name'];
}
