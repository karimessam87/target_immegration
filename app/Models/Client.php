<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use League\CommonMark\Node\Block\Document;

class Client extends Authenticatable
{
  use HasFactory, SoftDeletes, Notifiable;

  protected $fillable = [
    'firstname', 'middlename', 'lastname', 'password', 'email',
    'marital', 'birthday', 'gender', 'region', 'status', 'type',
    'phone', 'avatar', 'company', 'client_type_id', 'spouse_id', 'parent_id', 'flag_id', 'label_id'
  ];

  public function setPasswordAttribute($value)
  {
    $this->attributes['password'] = Hash::make($value);
  }

  public function getFullNameAttribute()
  {
    return "$this->firstname $this->middlename $this->lastname ";
  }

  public function detail(): \Illuminate\Database\Eloquent\Relations\HasOne
  {
    return $this->hasOne(ClientDetail::class);
  }

  public function certificates()
  {
    return $this->hasMany(ClientEducation::class);
  }

  public function documents()
  {
    return $this->hasMany(ClientDocument::class);
  }

  public function languages()
  {
    return $this->hasMany(ClientLanguage::class);
  }

  public function financialReports()
  {
    return $this->hasMany(FinancialReport::class);
  }

  public function canadianConnections()
  {
    return $this->hasMany(CanadianConnection::class);
  }

  public function workHistories()
  {
    return $this->hasMany(ClientWorkHistory::class);
  }

  public function clientType(): BelongsTo
  {
    return $this->belongsTo(ClientType::class);
  }

  public function flag(): BelongsTo
  {
    return $this->belongsTo(Flag::class);
  }

  public function file(): \Illuminate\Database\Eloquent\Relations\HasOne
  {
    return $this->hasOne(File::class);
  }

  public function label(): BelongsTo
  {
    return $this->belongsTo(Label::class);
  }

  public function childern()
  {
    return $this->hasMany(Client::class, 'parent_id');
  }

  public function parent()
  {
    return $this->belongsTo(Client::class, 'parent_id');
  }

  public function spouse()
  {
    return $this->belongsTo(Client::class, 'spouse_id');
  }

  public function avatar()
  {
    return !is_null($this->avatar) || !empty($this->avatar) ? asset('storage/clients/' . $this->avatar) : 'assets/img/profiles/default.jpg';
  }


}
