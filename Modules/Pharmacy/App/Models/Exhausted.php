<?php

namespace Modules\Pharmacy\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pharmacy\Database\factories\ExhaustedFactory;

class Exhausted extends Model
{
    use HasFactory;

    protected $table = 'pharmacy_exhausteds';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['generic_code','generic_name', 'product_name', 'manufacturer', 'classification', 'circular_date', 'circular', 'status'];

    protected static function newFactory(): ExhaustedFactory
    {
        return ExhaustedFactory::new();
    }

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:m:s',
        'updated_at' => 'datetime:d-m-Y h:m:s',
    ];

    public function QueryTable($keyWord = null, $sortField, $sortDirection): mixed
    {
        return $this->select('id','generic_code','generic_name', 'product_name', 'manufacturer', 'classification',
         'circular_date', 'circular', 'status')
        ->search('generic_code', $keyWord)
        ->search('generic_name', $keyWord)
        ->search('status', $keyWord)
        ->orderBy($sortField, $sortDirection);
    }
}
