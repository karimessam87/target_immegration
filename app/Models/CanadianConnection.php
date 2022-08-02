<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanadianConnection extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  public function clientDocument()
  {
    return $this->hasMany(ClientDocument::class);
  }

  public function document()
  {
    return !is_null($this->document) || !empty($this->document) ? asset('storage/' . $this->document) : 'assets/img/profiles/default.jpg';
  }
}
