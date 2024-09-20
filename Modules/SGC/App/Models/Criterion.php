<?php

namespace Modules\SGC\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\SGC\Database\factories\CriterionFactory;
use Wildside\Userstamps\Userstamps;

class Criterion extends Model
{
    use HasFactory;
    use Userstamps;

    protected $table = 'sgc_criteria';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['checklist_id', 'evaluated', 'description', 'findings', 'observations', 'evidence', 'status'];

    protected static function newFactory(): CriterionFactory
    {
        return CriterionFactory::new();
    }

    public function QueryTable($keyWord = null, $sortField, $sortDirection): mixed
    {
        return $this->select('id', 'checklist_id', 'evaluated', 'description', 'findings', 'observations', 'evidence', 'status')
        ->search('evaluated', $keyWord)
        ->search('description', $keyWord)
        ->search('findings', $keyWord)
        ->orderBy($sortField, $sortDirection);
    }
}
