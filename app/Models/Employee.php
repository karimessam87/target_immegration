<?php

namespace App\Models;

use App\Models\Department;
use App\Models\Designation;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Employee extends Authenticatable
{
  use HasFactory, SoftDeletes, Notifiable;

  protected $guarded = [
    'id'
  ];

  public function setPasswordAttribute($value)
  {
    $this->attributes['password'] = Hash::make($value);
  }

  public function getFullnameAttribute()
  {
    return $this->firstname . " " . $this->lastname;
  }

  public function department()
  {
    return $this->belongsTo(Department::class);
  }

  public function designation()
  {
    return $this->belongsTo(Designation::class);
  }

  public function cv(): ?string
  {
    return !is_null($this->cv) || isset($this->cv) ? asset("storage/$this->cv") : '';
  }

  public function avatar()
  {
    return !is_null($this->avatar) || !empty($this->avatar) ? asset('storage/employees/' . $this->avatar) : 'assets/img/profiles/default.jpg';
  }

}
