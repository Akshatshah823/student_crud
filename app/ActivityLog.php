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

    public function model()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
