<?php

namespace Modules\SGC\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\SGC\Database\factories\ObservationFactory;
use Wildside\Userstamps\Userstamps;

class Observation extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'sgc_observations';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['checklist_id', 'criterion_id', 'description', 'evidence', 'consequence', 'requirement', 'status'];

    protected static function newFactory(): ObservationFactory
    {
        return ObservationFactory::new();
    }

        public function checklist(): BelongsTo
        {
            return $this->belongsTo(Checklist::class);
        }

        public function criterion(): BelongsTo
        {
            return $this->belongsTo(Criterion::class);
        }
}
