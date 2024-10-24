<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Budget extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_budget';

    protected $fillable =           
        [   
            'id_proj',
            'id_budget',
            'budget_name',
            'budget_value',
            'budget_description'
        ];
        
        public function project(): BelongsTo
        {
            return $this->belongsTo(Project::class,'id_proj');
        }

        public function cost(): HasMany
        {
            return $this->hasMany(Cost::class,'id_proj');
        }
}
