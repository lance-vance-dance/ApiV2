<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = ['name', 'course'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'id', 'user_id');
    }

    public function __toString()
    {
        return "{$this->course}{$this->name}";
    }
}