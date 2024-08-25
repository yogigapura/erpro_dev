<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cost extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cost';

    protected $fillable =           
        [   
            'id_cost',
            'id_proj',
            'id_budget',
            'cost_name',
            'cost_value',
            'cost_description',
            'cost_document'
        ];

        
        public function budget(): BelongsTo
        {
            return $this->belongsTo(Budget::class,'id_proj');
        }
}


// https://github.com/Saeid-Khaleghi/media-store