<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientType extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'description', 'status', 'color'
    ];
    protected $casts = [
        'status' => 'boolean'
    ];

    public function clients()
    {
        return $this->hasMany(Client::class, 'client_type_id');
    }
}
