<?php

namespace Modules\SGC\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\SGC\Database\factories\AuditedFactory;
use Wildside\Userstamps\Userstamps;

class Audited extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'sgc_auditeds';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['cycle_id', 'identification', 'first_name', 'last_name', 'position', 'status'];

    protected static function newFactory(): AuditedFactory
    {
        return AuditedFactory::new();
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
    ];

    public function QueryTable($keyWord = null, $sortField, $sortDirection): mixed
    {
        return $this->select('id','cycle_id', 'identification', 'first_name', 'last_name', 'position', 'status', 'created_by', 'updated_by')
        ->search('identification', $keyWord)
        ->search('first_name', $keyWord)
        ->search('last_name', $keyWord)
        ->search('position', $keyWord)
        ->orderBy($sortField, $sortDirection);
    }
}
