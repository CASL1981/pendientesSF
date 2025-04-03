<?php

namespace Modules\Pharmacy\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pharmacy\Database\factories\DetailPendingFactory;
use Wildside\Userstamps\Userstamps;

class DetailPending extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'pharmacy_detail_pendings';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['product_id', 'pending_id', 'product_name', 'brand', 'destination', 'quantity', 'send_quantity', 'order', 'circular', 'status'];

    protected static function newFactory(): DetailPendingFactory
    {
        return DetailPendingFactory::new();
    }

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:m:s',
        'updated_at' => 'datetime:d-m-Y h:m:s',
    ];

    public function QueryTable($keyWord = null, $sortField, $sortDirection): mixed
    {
        return $this->select('id','product_id', 'pending_id', 'product_name', 'brand', 'destination', 'quantity', 
        'send_quantity', 'order', 'circular', 'status', 'created_at')
        ->search('product_name', $keyWord)
        ->search('product_id', $keyWord)
        ->search('pending_id', $keyWord)
        ->search('observations', $keyWord)
        ->search('status', $keyWord)
        ->orderBy($sortField, $sortDirection);
    }
}
