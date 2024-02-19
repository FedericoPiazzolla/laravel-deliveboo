<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'price', 'available'];

    public function SetNameAttribute($_name)
    {
        $this->attributes['name'] = $_name;
        $this->attributes['slug'] = Str::slug($_name);
    }

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }
}
