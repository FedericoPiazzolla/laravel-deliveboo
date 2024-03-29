<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Dish extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'description', 'price', 'available', 'image'];

    public function SetNameAttribute($_name)
    {
        $this->attributes['name'] = $_name;
        $this->attributes['slug'] = Str::slug($_name);
    }

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class)->withPivot('dish_quantity');
    }
}
