<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Certificate;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use HasApiTokens;
  use HasFactory;
  use HasProfilePhoto;
  use Notifiable;
  use TwoFactorAuthenticatable;
  use HasRoles;
  const ADMIN=0;
  const CLIENT=1;
  const LAWYER=2;
  const KAZI=3;
  const EMPLOYEE=4;
  const SPONSOR=5;
  const AGENT=6;
  const PENDING=0;
  const ACCEPTED=1;
  const SUSPENDED=2;
  const RESTRICTED=3;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    
    'email',
    'phone',
   
    'password',
    
    'status',
    'referral_code',
  
    'user_role',
    
    'nid',
    'verification',
    

  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
    'two_factor_recovery_codes',
    'two_factor_secret',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  /**
   * The accessors to append to the model's array form.
   *
   * @var array
   */
  protected $appends = [
    'profile_photo_url',
  ];
  public function orderedCourses() :HasMany
  {
    return $this->hasMany(CourseOrder::class);
  }
 

    public function certificates()
    {
        return $this->hasMany(MarraigeCertificate::class);
    }

    public function marraigeCertificate()
    {
        return $this->hasOne(MarraigeCertificate::class);
    }

    public function placesLiveds()
    {
        return $this->hasMany(PlacesLived::class);
    }

    public function hobbies()
    {
        return $this->hasMany(Hobby::class);
    }

    public function qualities()
    {
        return $this->hasMany(Quality::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }
    public function profile()
    {
      return $this->hasOne(Profile::class,'user_id');
    }
    public function lawyer() 
    {
      return $this->hasOne(Lawyer::class,'user_id');
    }
    public function kazi()
    {
      return $this->hasOne(Kazi::class, 'user_id');
    }
  public function agent()
  {
    return $this->hasOne(Agent::class, 'user_id');
  }
  public function employee()
  {
    return $this->hasOne(Employee::class, 'user_id');
  }
  public function orders(): HasMany
  {
    return $this->hasMany(Order::class);
  }

  public function reviews(): HasMany
  {
    return $this->hasMany(Review::class);
  }
  public function report(): HasMany
  {
    return $this->hasMany(Report::class,'user_id');
  }
  public function favourite(): HasMany
  {
    return $this->hasMany(Favourite::class ,'user_id');
  }
    
}
