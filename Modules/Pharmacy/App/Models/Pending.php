<?php

namespace Modules\Pharmacy\App\Models;

use App\Models\Destination;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Pharmacy\Database\factories\PendingFactory;
use Modules\Shopping\App\Models\Product;
use Wildside\Userstamps\Userstamps;

class Pending extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Userstamps;

    protected $table = 'pharmacy_pendings';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['type', 'category','destination', 'reason', 'duration', 'EPS', 'contracting_modality', 'user_id', 
                            'invoicing_method', 'manager', 'observations', 'status'];

    protected static function newFactory(): PendingFactory
    {
        return PendingFactory::new();
    }

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:m:s',
        'updated_at' => 'datetime:d-m-Y h:m:s',
    ];

    public function QueryTable($keyWord = null, $sortField, $sortDirection): mixed
    {
        return $this->select('id','type', 'category','destination', 'reason', 'duration', 'EPS', 'contracting_modality', 'user_id',
                    'invoicing_method', 'manager', 'observations', 'status', 'created_at')
        ->search('type', $keyWord)
        ->search('observations', $keyWord)
        ->search('status', $keyWord)
        ->orderBy($sortField, $sortDirection);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
