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
    protected $fillable = ['type', 'destination_id', 'product_id', 'quantity', 'send_quantity', 'reason', 'duration', 'EPS',
     'contracting_modality', 'user_id', 'invoicing_method', 'manager', 'order', 'circular', 'observations', 'status'];

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
        return $this->select('id','type', 'destination_id', 'product_id', 'quantity', 'send_quantity', 'reason', 'duration', 'EPS',
     'contracting_modality', 'user_id', 'invoicing_method', 'manager', 'order', 'circular', 'observations', 'status')
        ->search('type', $keyWord)
        ->search('product_id', $keyWord)
        ->search('destination_id', $keyWord)
        ->search('observations', $keyWord)
        ->search('status', $keyWord)
        ->orderBy($sortField, $sortDirection);
    }

    public function destination():BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
