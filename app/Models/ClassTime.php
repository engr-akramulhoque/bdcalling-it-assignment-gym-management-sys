<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainer_id',
        'date',
        'start_time',
        'end_time',
        'capacity',
        'status',
        'participated',
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id');
    }
}
