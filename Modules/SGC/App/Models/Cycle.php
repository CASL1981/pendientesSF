<?php

namespace Modules\SGC\App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\SGC\Database\factories\CycleFactory;
use Wildside\Userstamps\Userstamps;

class Cycle extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'sgc_cycles';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['year', 'description', 'status'];

    protected static function newFactory(): CycleFactory
    {
        return CycleFactory::new();
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
        return $this->select('id','year','description','status', 'created_by', 'updated_by')
        ->search('year', $keyWord)
        ->search('description', $keyWord)
        ->orderBy($sortField, $sortDirection);
    }
}
