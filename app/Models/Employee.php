<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   
    use HasFactory;
    const EMPLOYEE = 1;
    const MANAGER = 2;
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
