<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
     protected $fillable = [
        'model_type', 'model_id', 'action', 'changes', 'user_id'
    ];

    protected $casts = [
        'changes' => 'array',
    ];

    

   
}
