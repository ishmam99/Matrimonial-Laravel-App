<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
 
class Matching extends Model
{
    use HasFactory;
    protected $guarded=['id'];
     
    public function sender() : BelongsTo
    {
        return $this->belongsTo(Profile::class,'sent_id');
    }
    public function receiver(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'receive_id');
    }
}
