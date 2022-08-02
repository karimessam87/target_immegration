<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'nationality_number', 'passport_number', 'passport_date', 'additional_phone',
        'additional_email', 'cic_username', 'cic_password', 'sponsor_eligibility', 'client_id',
        'sponsor_name', 'canadian_status'
    ];
    
}
