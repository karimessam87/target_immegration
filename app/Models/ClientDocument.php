<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientDocument extends Model
{
  use HasFactory;

  protected $fillable = [
    'name', 'description', 'country_issue', 'file', 'issue_date', 'expire_date',
    'document_type_id', 'flag_id', 'label_id', 'client_id'
  ];

  public function documentType()
  {
    return $this->belongsTo(DocumentType::class);

  }

  public function flag()
  {
    return $this->belongsTo(Flag::class);
  }

  public function label()
  {
    return $this->belongsTo(Label::class);
  }

  public function attachment()
  {
    return !is_null($this->file) || isset($this->avatar) ? asset("storage/$this->file") : 'assets/img/profiles/default.jpg';
  }
}
