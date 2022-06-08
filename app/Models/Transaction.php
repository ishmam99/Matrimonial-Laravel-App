<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable=['trx_id','prove_document','amount'];
    public function courseOrder(): HasOne
    {
        return $this->hasOne(CourseOrder::class);
    }
    // public function order(): BelongsTo
    // {
    //     return $this->belongsTo(Order::class);
    // }
}
