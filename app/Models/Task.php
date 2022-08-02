<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
  use HasFactory;

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = [
    'created_at',
    'updated_at',
    'started_at'
  ];

  public const STATUS = [
    '0' => 'Reviewed',
    '1' => 'Pending',
    '2' => 'Completed'
  ];

  protected $fillable = [
    'name',
    'description',
    'due_date',
    'expire_date',
    'due_time',
    'expire_time',
    'flag_id',
    'label_id',
    'employee_id',
    'leader_id',
    'status',
    'task_type_id',
    'department_id',
    'started_at',
  ];


  public function flag(): BelongsTo
  {
    return $this->belongsTo(Flag::class);
  }

  public function label(): BelongsTo
  {
    return $this->belongsTo(Label::class);
  }

  public function employee(): BelongsTo
  {
    return $this->belongsTo(Employee::class);
  }

  public function leader(): BelongsTo
  {
    return $this->belongsTo(Leader::class);
  }

  public function taskType(): BelongsTo
  {
    return $this->belongsTo(TaskType::class);
  }

  public function department(): BelongsTo
  {
    return $this->belongsTo(Department::class);
  }

  public function attachments()
  {
    return $this->hasMany(TaskAttachment::class);
  }

  public function getExpireAtTimeAttribute(): string
  {
    return date("h:i A", strtotime($this->expire_time));
  }

  public function getDueAtTimeAttribute(): string
  {
    return date("h:i A", strtotime($this->due_time));
  }


}
