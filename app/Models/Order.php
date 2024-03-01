<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['interested_user_name', 'interested_user_surname', 'interested_user_address', 'interested_user_email', 'interested_user_phone'];

    public function dishes()
    {
        return $this->belongsToMany(Dish::class)->withPivot('dish_quantity');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:i');
    }
}
