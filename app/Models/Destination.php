<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Destination extends Model
{
    use HasFactory;
    use Userstamps;

    protected $fillable = ['costcenter', 'name', 'address', 'phone', 'location', 'minimun', 'maximun'];


    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:m:s',
        'updated_at' => 'datetime:d-m-Y h:m:s',
    ];

    public function QueryTable($keyWord = null, $sortField, $sortDirection): mixed
    {
        return $this->select('id','costcenter', 'name', 'address', 'phone', 'location', 'minimun', 'maximun')
        ->search('name', $keyWord)
        ->search('costcenter', $keyWord)
        ->search('address', $keyWord)
        ->orderBy($sortField, $sortDirection);
    }
}
