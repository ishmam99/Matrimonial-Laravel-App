<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;
    const PROCESSING=0;
    const DELIVERED=1;
    const CANCELLED=2;
    const UNPAID =0;
    const PAID= 1;
    const ONLINE = 0;
    const CONDITIONAL=1;
    protected $fillable = ['user_id','product_id', 'transaction_id', 'quantity', 'delivery_type', 'paid_status', 'amount','status'];

    public function product(): BelongsTo
    {
      return $this->belongsTo(Product::class,'product_id');
    }

    public function consumer(): BelongsTo
    {
      return $this->belongsTo(User::class, 'user_id');
    }
  public function transaction(): BelongsTo
  {
    return $this->belongsTo(Transaction::class, 'transaction_id');
  }
  }
