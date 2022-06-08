<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Profile extends Model
{


    const SSC=1;
    const HSC=2;
    const BACHELOR=3;
    const MASTERS=4;
    const PHD=5;

    const MALE = 1;
    const FEMALE = 2;
    const OTHERS = 3;
    const PREMIUM = 1;
    const REGUALR = 2;
    const MARRIED = 1;
    const UNMARRIED = 2;
    
    const ACTIVE = 0;
    const RESTRICTED =1;
    const SUSPENDED =2;
   // const PRIORITY=3;
    const ISLAM = 1;
    const HINDU = 2;
    const BUDDHIST = 3;
    const CHRISTIAN = 4;
    const OTHER = 5;
    use HasFactory;
    protected $dates=['birthdate'];
    protected $fillable = [
        'user_id',
        'email',
        'name',
        'intro',
        'education_level',
        'salary',
        'country_id',
        'city_id',
        'birthdate',
        'job_id',
        'relation_status',
        'birthplace',
        'ancestry',
        'hobby_id',
        'political_view',
        'religion',
        'favourite_show',
        'favourite_band',
        'favourite_sport',
        'medical_history',
        'profile_photo',
        'cover_photo',
        'profile_type',
        'package_id',
        'nid_photo',
        'skin_tone_id',
        'gender'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
    public function hobby(): BelongsTo
    {
        return $this->belongsTo(Hobby::class);
    }
    public function education(): HasMany
    {
        return $this->hasMany(Education::class);
    }
    public function skinTone() :BelongsTo
    {
        return $this->belongsTo(SkinTone::class);
    }
    public function priority() :HasOne
    {
        return $this->hasOne(Priority::class);
    }
    public function badgeUser()
    {
        return $this->hasOne(BadgeUser::class);
    }
    public function userCase(): HasMany
    {
        return $this->hasMany(UserCase::class);
    }
    public function followings(): HasMany
    {
        return $this->hasMany(Follow::class,'follower_id');
    }
    public function followers(): HasMany
    {
        return $this->hasMany(Follow::class,'following_id');
    }

    public function senders(): HasMany
    {
        return $this->hasMany(Matching::class, 'sent_id');
    }
    public function receivers(): HasMany
    {
        return $this->hasMany(Matching::class, 'receive_id');
    }
    public function matchings(): HasMany
    {
        return $this->hasMany(Matching::class, 'receive_id','sent_id');
    }
   
    public function userPackage(): HasOne
    {
        return $this->hasOne(UserPackage::class);
    }

    public function userAgent(): HasMany
    {
        return $this->hasMany(UserAgent::class);
    }
    public function userKazi(): HasMany
    {
        return $this->hasMany(UserKazi::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function swipe() :HasMany
    {
        return $this->hasMany(SwipMatch::class);
    }
    public function followingList(): HasMany
    {
        return $this->hasMany(Follow::class, 'following_id');
    }
    public function followerList(): HasMany
    {
        return $this->hasMany(Follow::class, 'follower_id');
    }
    public function coursePackageUser() : HasMany
    {
        return $this->hasMany(PackageCourseUser::class);
    }
    public function favourites(): HasMany
    {
        return $this->hasMany(Favourite::class);
    }
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    public function report(): HasMany
    {
        return $this->hasMany(Report::class);
    }
    public function productReviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }
    public function courseReviews(): HasMany
    {
        return $this->hasMany(CourseReview::class);
    }

    public function userProfessionalPackage()
    {
        return $this->hasMany(UserProfessionalPackage::class);
    }
    public function userProfileStatusPackage()
    {
        return $this->hasMany(UserProfileStatusBoostPackage::class);
    }
    public function userCourse()
    {
        return $this->hasMany(UserCourse::class);
    }
    public function productReturn()
    {
        return $this->hasMany(ProductReturn::class);
    }
    public function shopPackageOrder()
    {
        return $this->hasMany(ShopPackageOrder::class);
    }
}
