<?php

namespace Modules\SGC\App\Models;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\SGC\Database\factories\ChecklistFactory;
use Wildside\Userstamps\Userstamps;

class Checklist extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'sgc_checklists';


    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['cycle_id', 'type', 'destination_id', 'process', 'date_activity', 'responsible', 'audited', 'documents',
                            'strength', 'observations', 'prepared_by', 'accepted_by', 'status'];

    protected static function newFactory(): ChecklistFactory
    {
        return ChecklistFactory::new();
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

    public function QueryTable($keyWord = null, $sortField, $sortDirection): mixed
    {
        return $this->select('id','cycle_id','type', 'destination_id', 'process', 'date_activity', 'responsible', 'audited', 'documents',
                            'strength', 'observations', 'prepared_by', 'accepted_by', 'created_by', 'updated_by', 'status')
        ->search('type', $keyWord)
        ->search('process', $keyWord)
        ->search('responsible', $keyWord)
        ->orderBy($sortField, $sortDirection);
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    public function cycle(): BelongsTo
    {
        return $this->belongsTo(Cycle::class);
    }

    public function observations(): HasMany
    {
        return $this->hasMany(Observation::class);
    }

    public function findings(): HasMany
    {
        return $this->hasMany(Find::class);
    }

    public function criterion(): BelongsTo
    {
        return $this->belongsTo(Criterion::class);
    }
}
