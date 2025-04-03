<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Classification extends Model
{
    use HasFactory;
    use Userstamps;

    protected $fillable = ['code', 'level', 'parent', 'name', 'impute'];


    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:m:s',
        'updated_at' => 'datetime:d-m-Y h:m:s',
        'deleted_at' => 'datetime:d-m-Y h:m:s',
    ];

    public function QueryTable($keyWord = null, $sortField, $sortDirection): mixed
    {
        return $this->select('id','code', 'level', 'parent', 'name', 'impute')
        ->search('name', $keyWord)
        ->orderBy($sortField, $sortDirection);
    }
}
