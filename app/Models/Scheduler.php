<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheduler extends Model
{
    use HasFactory;

    protected $table = 'scheduler';

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function cabinet()
    {
        return $this->belongsTo(Cabinet::class);
    }
}
