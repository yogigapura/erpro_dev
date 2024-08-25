<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id_proj';

    protected $fillable =           
        [   
            'id_proj',
            'id_cust',
            'proj_name',
            'proj_contract',
            'proj_value',
            'proj_due_date',
            'proj_detail'
        ];

        // Define the relationship: An project belongs to a customer
        public function customer(): BelongsTo
        {
            return $this->belongsTo(Customer::class,'id_cust');
        }

        public function budget(): HasMany
        {
            return $this->hasMany(Budget::class,'id_proj');
        }
}
