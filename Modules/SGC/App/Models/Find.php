<?php

namespace Modules\SGC\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\SGC\Database\factories\FindFactory;
use Wildside\Userstamps\Userstamps;

class Find extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'sgc_finds';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['checklist_id', 'criterion_id', 'description', 'evidence', 'consequence', 'requirement', 'status'];

    protected static function newFactory(): FindFactory
    {
        return FindFactory::new();
    }

    public function getStatusColorAttribute(): string
    {
        return [
            '1' => 'success',
            '0' => 'danger',
        ][$this->status] ?? 'info';
    }

    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:m:s',
        'updated_at' => 'datetime:d-m-Y h:m:s',
        'date_activity' => 'date',
    ];

    public function checklist(): BelongsTo
    {
        return $this->belongsTo(Checklist::class);
    }

    public function criterion(): BelongsTo
    {
        return $this->belongsTo(Criterion::class);
    }
}
