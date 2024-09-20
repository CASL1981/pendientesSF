<?php

namespace Modules\HumanTalent\App\Models;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\HumanTalent\Database\factories\EmployeeFactory;
use Wildside\Userstamps\Userstamps;

class Employee extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'humantalent_employees';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['identification', 'first_name', 'last_name','status', 'type_document', 'address', 'phone',
                        'cel_phone', 'entry_date', 'email', 'gender', 'birth_date', 'location_id', 'approve', 'photo_path',
                        'vendedor', 'auditor', 'created_by', 'updated_by'];

    protected static function newFactory(): EmployeeFactory
    {
        return EmployeeFactory::new();
    }

    public function getStatusColorAttribute(): string
    {
        return [
            '1' => 'success',
            '0' => 'danger',
        ][$this->status] ?? 'info';
    }

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:m:s',
        'updated_at' => 'datetime:d-m-Y h:m:s',
    ];

    public function QueryTable($keyWord = null, $sortField, $sortDirection): mixed
    {
        return $this->select('id','identification', 'first_name', 'last_name','status', 'type_document',
                            'address', 'phone', 'cel_phone', 'entry_date', 'email', 'gender', 'vendedor',
                            'birth_date', 'location_id', 'approve', 'created_by', 'updated_by')
        ->with(['creator', 'editor'])
        ->search('first_name', $keyWord)
        ->search('last_name', $keyWord)
        ->orderBy($sortField, $sortDirection);
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class, 'location_id');
    }
}
