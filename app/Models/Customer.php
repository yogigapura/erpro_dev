<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id_cust';

    protected $fillable =           
        [   
            'id',
            'cust_name',
            'cust_address',
            'cust_pic',
            'cust_no_contact',
            'cust_email',
            'id_group'
        ];

    // Define the relationship: A customer has many projects
    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }
}
