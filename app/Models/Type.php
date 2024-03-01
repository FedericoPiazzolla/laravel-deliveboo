<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'slug',
    ];

    public function SetNameAttribute($_name)
    {
        $this->attributes['name'] = $_name;
        $this->attributes['slug'] = Str::slug($_name);  
    }

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
