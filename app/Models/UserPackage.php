<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPackage extends Model
{
    use HasFactory;
    const PENDING=0;
    const APPROVED=1;
    const CANCELLED=2;
    protected $fillable=['profile_id','package_id','transaction_id','status'];

    public function profile() 
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }

    public function package() :BelongsTo
    {
        return $this->belongsTo(Package::class,'package_id');
    }
    public function transaction() :BelongsTo
    {
        return $this->belongsTo(Transaction::class,'transaction_id');
    }
}
