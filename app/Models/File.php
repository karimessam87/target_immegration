<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'number', 'noc', 'cic', 'job_seeker_code',
        'score', 'application_effective_date', 'file_type_id',
        'file_statue_id', 'file_label_id', 'client_id'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function fileType(): BelongsTo
    {
        return $this->belongsTo(FileType::class);
    }

    public function fileLabel(): BelongsTo
    {
        return $this->belongsTo(FileLabel::class);
    }

    public function fileStatue(): BelongsTo
    {
        return $this->belongsTo(FileStatue::class);
    }

}
