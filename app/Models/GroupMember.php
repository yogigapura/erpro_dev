<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupMember extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =           
        [   
            'group_name',
            'group_description'
        ];

        public function user(): HasMany
    {
        return $this->hasMany(GroupMember::class);
    }
}
