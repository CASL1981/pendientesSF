<?php

namespace Modules\Pharmacy\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pharmacy\Database\factories\StockFactory;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'pharmacy_stocks';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['year', 'period', 'product_id', 'product_name', 'quantity','available', 'generic_code'];

    protected static function newFactory(): StockFactory
    {
        return StockFactory::new();
    }
}
