<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationalStructure extends Model
{
    protected $fillable = [
        'category',
        'role',
        'name',
        'nip',
        'photo',
        'order_position'
    ];
}
