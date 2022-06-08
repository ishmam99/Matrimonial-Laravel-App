<?php

use App\Http\Controllers\API\AgentController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BadgeController;
use App\Http\Controllers\API\ChatController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\CoursePackageController;
use App\Http\Controllers\API\FavouriteController;
use App\Http\Controllers\API\FollowController;
use App\Http\Controllers\API\KaziController;
use App\Http\Controllers\API\LawyerController;
use App\Http\Controllers\API\MatchmakingController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\ReportController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\SwipeMatchController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MarraigeCertificateController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\SuccessStoriesController;
use App\Http\Controllers\UserProfessionalPackageController;
use App\Http\Controllers\UserProfileStatusBoostPackageController;
use App\Http\Controllers\Website\HomeController;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('apiRules')->group(
    function () {
Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']); 
Route::get('all-courses',[CourseController::class, 'allCourses']);
Route::get('course-show/{course}', [CourseController::class, 'show']);
Route::get('lawyer',[LawyerController::class,'index']);
Route::get('lawyer/{lawyer}', [LawyerController::class, 'show']);
Route::get('agent', [AgentController::class, 'index']);
Route::get('agent/{agent}', [AgentController::class, 'show']);
Route::get('kazi', [KaziController::class, 'index']);
Route::get('kazi-show/{kazi}', [KaziController::class, 'show']);
Route::get('latest-members',[HomeController::class,'latestMember']);
Route::get('category/{id}', [ProductController::class, 'category']);
Route::get('blog/{blog}', [ProductController::class, 'blog']);
Route::get('blog-list', [ProductController::class, 'blogList']);
Route::get('package-list', [BadgeController::class, 'package']);
Route::get('package/professional', [BadgeController::class, 'professionalPackage']);
Route::get('profileStatusPackages', [UserProfileStatusBoostPackageController::class, 'index']);
Route::get('post-list', [PostController::class, 'postList']);
Route::get('product', [ProductController::class,'index']);
Route::get('course-top', [CourseController::class, 'top']);
Route::get('course/categories', [CourseController::class, 'categories']);
Route::get('product-top', [ProductController::class, 'top']);
Route::get('categories', [ProductController::class, 'categories']);
Route::get('product/{product}',[ProductController::class,'show']);
Route::get('slider',[HomeController::class,'slider']);
Route::get('top-groom', [ProfileController::class, 'topGroom']);
Route::get('profile/{profile}', [ProfileController::class, 'show']);
Route::get('top-bride', [ProfileController::class, 'topBride']);
Route::get('success-stories',[SuccessStoriesController::class,'stories']);
Route::get('job',[JobController::class,'index']);
Route::get('hobby', [HobbyController::class, 'index']);
Route::get('skinTone', [ProfileController::class, 'skin']); 
Route::get('country',[ProfileController::class,'country']);
Route::get('city', [ProfileController::class, 'city']);
Route::get('shop-packages', [ProductController::class, 'package']);
Route::get('course/package/list', [CoursePackageController::class, 'index']);
Route::get('course/package/{coursePackage}', [CoursePackageController::class, 'show']);
Route::middleware('auth:sanctum')->group(function(){
    Route::get('notifications',[ProfileController::class,'notification']);
    Route::post('course/package-order', [CoursePackageController::class, 'store']);
    Route::post('course/package-payment', [CoursePackageController::class, 'makePayment']);
    Route::post('submitAnswer',[CourseController::class, 'submitAnswer']);
    Route::post('shop-package/buy',[ProductController::class,'buyPackage']);
    Route::get('course/myCourse/quizzes/{userCourse}', [CourseController::class, 'showQuizzes']);
    Route::get('course/myCourse/List', [CourseController::class, 'myCourseList']);
    Route::get('shop-package/orders', [ProductController::class, 'packageOrders']);
    Route::apiResource('productReview',ProductReviewController::class);
    Route::post('productReturn',[ProductController::class, 'productReturnStore']);
    Route::get('productReturn/list', [ProductController::class, 'productReturnList']);
    Route::get('logout',[AuthController::class, 'logout']);
    Route::apiResource('profile',ProfileController::class)->except('show');
    Route::post('report',[ReportController::class,'store']);
    Route::post('favourite',[FavouriteController::class,'store']);
    Route::delete('favourite/{favourite}', [FavouriteController::class, 'destroy']);
    Route::get('favourite/lawyer', [FavouriteController::class, 'lawyer']);
    Route::get('favourite/agent', [FavouriteController::class, 'agent']);
    Route::apiResource('education',EducationController::class);
    Route::get('swipe-list',[SwipeMatchController::class,'swipeList']);
    Route::apiResource('course',CourseController::class);
    Route::post('course-review/{course}', [CourseController::class, 'reviews']);
    Route::get('timeline',[PostController::class,'timeline']);
    Route::apiResource('post',PostController::class);
    Route::apiResource('swipe', SwipeMatchController::class);
    Route::post('order', [ProductController::class, 'order']);
    Route::get('order/list',[ProductController::class,'orderList']);
    Route::apiResource('user-professional-package',UserProfessionalPackageController::class);
  
//Lawyer Case User
    Route::get('hire/lawyer/{id}',[LawyerController::class,'hire']);
    Route::get('my-case', [LawyerController::class, 'myCase']);
    Route::get('user-case/{id}', [LawyerController::class, 'userCase']);
    Route::get('lawyer-case/{id}', [LawyerController::class, 'lawyerCase']);
    Route::post('user-case/{id}', [LawyerController::class, 'userUpdate']);
    Route::post('lawyer-case/{id}', [LawyerController::class, 'lawyerUpdate']);
    Route::get('lawyer-case-list', [LawyerController::class, 'lawyerCaseList']);
//Agent Contract User 
 Route::get('hire/agent/{id}',[AgentController::class,'hire']);
   Route::get('my-agent-contract/list',[AgentController::class, 'userAgentContractList']);
    Route::get('agent-contract-list',[AgentController::class, 'agentContractList']);
    Route::get('my-agent-contract-show/{id}',[AgentController::class, 'userAgentContract']);
    Route::get('agent-contract-show/{id}',[AgentController::class, 'agentContract']);
    Route::post('my-agent-contract-update/{id}',[AgentController::class, 'userAgentContractUpdate']);
    Route::post('agent-contract-update/{id}',[AgentController::class, 'agentContractUpdate']);
//Kazi Contract User
   
   Route::get('hire/kazi/{id}',[KaziController::class,'hire']);
   Route::get('my-kazi-contract/list',[KaziController::class, 'userKaziContractList']);
    Route::get('kazi-contract-list',[KaziController::class, 'kaziContractList']);
    Route::get('my-kazi-contract-show/{id}',[KaziController::class, 'userKaziContract']);
    Route::get('kazi-contract-show/{id}',[KaziController::class, 'kaziContract']);
    Route::post('my-kazi-contract-update/{id}',[KaziController::class, 'userKaziContractUpdate']);
    Route::post('kazi-contract-update/{id}',[KaziController::class, 'kaziContractUpdate']);
//End Kazi
    Route::post('course-payment', [CourseController::class, 'coursePayment']);
    Route::apiResource('certificate',MarraigeCertificateController::class,);
    Route::post('matchmaking',[MatchmakingController::class,'find']);
    Route::post('package-order',[ProfileController::class,'package']);
    Route::get('badges',[BadgeController::class,'index']);
    Route::get('suggested', [ProfileController::class, 'suggested']);
    //follow
    Route::get('follower',[FollowController::class,'followerList']);
    Route::get('following', [FollowController::class, 'followingList']);
    Route::get('following/accepted', [FollowController::class, 'acceptedFollowingList']);
    Route::post('follow',[FollowController::class,'requestFollow']);
    Route::get('follow/request-list', [FollowController::class, 'requestList']);
    Route::post('follow/accept-cancel/{follow}', [FollowController::class, 'acceptCancel']);
    Route::post('review',[ReviewController::class,'store']);
    Route::get('review/lawyer/{id}',[ReviewController::class,'lawyer']);
    Route::get('review/agent/{id}', [ReviewController::class, 'agent']);
    Route::get('review/kazi/{id}', [ReviewController::class, 'kazi']);

//Matchmaking
    Route::get('sender', [MatchmakingController::class, 'senderList']);
    Route::get('received', [MatchmakingController::class, 'receiverList']);
    Route::post('match-request', [MatchmakingController::class, 'requestMatch']);
    Route::get('my-matchings', [MatchmakingController::class, 'myMatchings']);
    Route::post('match/accept-cancel/{matching}', [MatchmakingController::class, 'acceptCancel']);

    //Chat
    Route::post('messages',[ChatController::class,'message']);
    //Notification
    Route::get('clear-notification', [AuthController::class, 'clearNotification']);
    Route::get('notification', [AuthController::class, 'notification']);
    Route::post('userProfileStatusPackage',[UserProfileStatusBoostPackageController::class,'store']);
    Route::get('userProfileStatusPackage/pending', [UserProfileStatusBoostPackageController::class, 'pending']);
    });
  });