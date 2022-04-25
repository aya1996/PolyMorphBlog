<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taggables extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function taggable() 
    {
        return $this->morphTo();
    }
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
