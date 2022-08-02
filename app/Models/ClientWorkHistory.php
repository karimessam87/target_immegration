<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientWorkHistory extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  public function client()
  {
    return $this->belongsTo(Client::class);
  }

  public function flag()
  {
    return $this->belongsTo(Flag::class);
  }

  public function clientDocuments()
  {
    return $this->belongsTo(ClientDocument::class);
  }

  public function resume()
  {
    return !is_null($this->resume) || !empty($this->resume) ? asset('storage/' . $this->resume) : 'assets/img/profiles/default.jpg';
  }

  public function hr_letters()
  {
    return !is_null($this->hr_letters) || !empty($this->hr_letters) ? asset('storage/' . $this->hr_letters) : 'assets/img/profiles/default.jpg';
  }
}
