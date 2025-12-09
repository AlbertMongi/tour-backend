<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'country',
        'language',
        'package',
        'travelers',
        'adults',
        'children_ages',
        'start_date',
        'end_date',
        'alternative_dates',
        'accommodation_level',
        'room_type',
        'dietary_restrictions',
        'special_requests',
        'arrival_method',
        'arrival_date_time',
        'flight_number',
        'payment_method',
        'payment_option',
        'emergency_name',
        'emergency_relation',
        'emergency_phone',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'arrival_date_time' => 'datetime',
    ];
}
