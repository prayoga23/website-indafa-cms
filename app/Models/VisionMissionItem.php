<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisionMissionItem extends Model
{
    protected $fillable = ['type', 'content', 'order_position'];
}
