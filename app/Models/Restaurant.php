<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['restaurant_email', 'restaurant_name','slug','restaurant_address'];
    public function setNameAttribute($_restaurant_name){
        $this->attributes['restaurant_name'] = $_restaurant_name;
        $this->attributes['slug'] = Str::slug($_restaurant_name);

    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function dishes() {
        return $this->hasMany(Dish::class);
    }

    public function types() 
    {
        return $this->belongsToMany(Type::class);
    }
}
