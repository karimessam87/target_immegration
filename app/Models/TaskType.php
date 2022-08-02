<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskType extends Model
{
  use HasFactory;

  protected $fillable = [
    'name', 'color', 'description', 'label'
  ];

  public function tasks()
  {
    return $this->hasMany(Task::class);
  }
}
