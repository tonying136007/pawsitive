<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'start_time',
        'finish_time',
        'comments',
        'client_id',
    ];
 
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}