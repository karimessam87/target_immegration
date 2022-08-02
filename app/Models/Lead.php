<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lead extends Model
{
  use HasFactory;

  protected $fillable = [
    'name', 'description', 'attachment', 'status',
    'project_id', 'department_id', 'flag_id', 'label_id',
  ];

  public function flag(): BelongsTo
  {
    return $this->belongsTo(Flag::class);
  }

  public function label(): BelongsTo
  {
    return $this->belongsTo(Label::class);
  }

  public function department(): BelongsTo
  {
    return $this->belongsTo(Department::class);
  }

  public function project(): BelongsTo
  {
    return $this->belongsTo(Project::class);
  }

  public function attachment()
  {
    return !is_null($this->attachment) || !empty($this->attachment) ? asset('storage/' . $this->attachment) : 'assets/img/profiles/default.jpg';
  }
}
