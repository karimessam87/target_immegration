<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientEducation extends Model
{
  use HasFactory;

  protected $table = 'client_educations';
  protected $guarded = ['id'];

  public function flag(): BelongsTo
  {
    return $this->belongsTo(Flag::class);
  }

  public function certificate()
  {
    return !is_null($this->certificate) || !empty($this->certificate) ? asset('storage/' . $this->certificate) : 'assets/img/profiles/default.jpg';
  }

  public function report()
  {
    return !is_null($this->credential_report) || !empty($this->credential_report) ? asset('storage/' . $this->credential_report) : 'assets/img/profiles/default.jpg';
  }
}
