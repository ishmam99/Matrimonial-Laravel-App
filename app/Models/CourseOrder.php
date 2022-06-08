<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CourseOrder extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','transaction_id','course_id','paid_status','status'];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function transaction() : HasOne
    {
        return $this->hasOne(Transaction::class,'id');
    }
}
