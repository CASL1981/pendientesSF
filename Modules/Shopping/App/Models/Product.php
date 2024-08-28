<?php

namespace Modules\Shopping\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Shopping\Database\factories\ProductFactory;
use Wildside\Userstamps\Userstamps;

class Product extends Model
{
    use HasFactory;
    use Userstamps;
    use SoftDeletes;

    protected $table = 'shopping_products';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['item', 'description', 'brand', 'ATC', 'invima', 'measure_unit', 'presentation',
                         'concentration', 'pharmaceutical_form', 'generic_name', 'generic_code', 'tax_percentage'];

    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:m:s',
        'updated_at' => 'datetime:d-m-Y h:m:s',
    ];

    public function QueryTable($keyWord = null, $sortField, $sortDirection)
    {
        return $this->select('id','item', 'description', 'brand', 'ATC', 'invima', 'measure_unit', 'presentation',
                         'concentration', 'pharmaceutical_form', 'generic_name', 'generic_code', 'tax_percentage')
        ->search('item', $keyWord)
        ->search('description', $keyWord)
        ->search('generic_name', $keyWord)
        ->search('generic_code', $keyWord)
        ->orderBy($sortField, $sortDirection);
    }
}
