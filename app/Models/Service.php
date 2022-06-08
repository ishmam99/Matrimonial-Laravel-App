<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model implements HasMedia
{
  use InteractsWithMedia;

  protected $guarded = [];

  public function registerMediaCollections(): void
  {
    $this->addMediaCollection('icon')->singleFile();
  }
}
