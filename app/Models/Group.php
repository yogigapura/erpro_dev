<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id_group';

    protected $fillable =           
        [   
            'group_name',
            'group_description',
            'id_user_maker'
        ];
}
