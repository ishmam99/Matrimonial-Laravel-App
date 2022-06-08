<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReturn extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
    public function profile()
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }
}
