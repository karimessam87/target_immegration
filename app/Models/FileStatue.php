<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileStatue extends Model
{
    use HasFactory;

    protected $table = 'file_statues';
    protected $fillable = [
        'name', 'value', 'color'
    ];
}
