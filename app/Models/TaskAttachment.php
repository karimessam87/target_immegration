<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAttachment extends Model
{
  use HasFactory;

  protected $fillable = [
    'attachment', 'task_id', 'flag_id'
  ];

  public function flag()
  {
    return $this->belongsTo(Flag::class);
  }

  public function tasks()
  {
    return $this->belongsToMany(Flag::class);
  }

  public function attachment()
  {
    return !is_null($this->attachment) || isset($this->attachment) ? asset("storage/$this->attachment") : 'assets/img/profiles/default.jpg';
  }
}
