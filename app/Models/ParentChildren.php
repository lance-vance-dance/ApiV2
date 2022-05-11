<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentChildren extends Model
{
    use HasFactory;

    protected $table = 'parents_children';

    public function user()
    {
        return $this->belongsTo(User::class, 'child_id', 'id');
    }
}
