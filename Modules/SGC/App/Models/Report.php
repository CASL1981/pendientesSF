<?php

namespace Modules\SGC\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\SGC\Database\Factories\ReportFactory;
use Wildside\Userstamps\Userstamps;

class Report extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'sgc_reports';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['cycle_id', 'star_date', 'end_date', 'objective', 'scope', 'auditores', 'auditados', 'documents',
                        'observations', 'diverging_opinions', 'conclusions', 'status'];

    protected static function newFactory(): ReportFactory
    {
        return ReportFactory::new();
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
        'star_date' => 'date',
        'end_date' => 'date',
    ];

    public function cycle(): BelongsTo
    {
        return $this->belongsTo(Cycle::class);
    }

    public function QueryTable($keyWord = null, $sortField, $sortDirection): mixed
    {
        return $this->select('id', 'cycle_id', 'star_date', 'end_date', 'objective', 'scope', 'auditores', 'auditados', 'documents',
                        'observations', 'diverging_opinions', 'conclusions', 'status')
        ->search('objective', $keyWord)
        ->search('scope', $keyWord)
        ->search('auditores', $keyWord)
        ->search('auditados', $keyWord)
        ->search('documents', $keyWord)
        ->orderBy($sortField, $sortDirection);
    }
}
