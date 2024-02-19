<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'company_name','slug','address'];
    public function setNameAttribute($_company_name){
        $this->attributes['company_name'] = $_company_name;
        $this->attributes['slug'] = Str::slug($_company_name);

    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
