<?php

use App\Http\Controllers\Admin\AgentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\LawyerController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CourseOrderController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Admin\KaziController;
use App\Http\Controllers\API\ReportController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\CourseReviewController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\AgentCategoryController;
use App\Http\Controllers\ContentMediaController;
use App\Http\Controllers\CourseContentController;
use App\Http\Controllers\CoursePackageController;
use App\Http\Controllers\LawyerCategoryController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProductReturnController;
use App\Http\Controllers\ProfessionalPackageController;
use App\Http\Controllers\ProfileStatusBoostPackageController;
use App\Http\Controllers\ShopPackageController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SuccessStoriesController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\UserPackageController;
use App\Http\Controllers\Website\ContactMessageController;
use App\Models\AgentCategory;
use App\Models\LawyerCategory;
use App\Models\ProfileStatusBoostPackage;
use App\Models\ShopPackage;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Artisan;
use Spatie\MediaLibrary\MediaCollections\Models\Media as MediaAlias;

// cache clear
Route::get('reboot', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    dd('Done');
});
Route::get('storageLink', function () {
    Artisan::call('storage:link');
    dd('Done');
});
Route::get('migrate', function () {
    Artisan::call('migrate');
    dd('Done');
});

Route:: middleware('web')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');




});

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::post('send/{id}', [HomeController::class,'sendNotification'])->name('notification.custom');
    Route::get('pay/{id}', [HomeController::class, 'sendNotificationPay'])->name('notification.pay');
    Route::get('upgrade/{id}', [HomeController::class, 'sendNotificationUpgrade'])->name('notification.upgrade');
    Route::view('/', 'dashboard.dashboard')->name('dashboard');
    Route::resource('user', UserController::class);
    Route::resource('succes-stories', SuccessStoriesController::class);
    Route::resource('faq', FaqController::class)->except('index', 'show');
    Route::resource('contact-message', ContactMessageController::class)->except(['show', 'create', 'edit', 'update']);
    Route::post('lawyer/addBadge/{lawyer}', [LawyerController::class, 'addBadge'])->name('lawyer.addBadge');
    Route::get('lawyer/accept/{lawyer}', [LawyerController::class,'accept'])->name('lawyer.accept');
    Route::get('lawyer/case/{lawyer}', [LawyerController::class, 'case'])->name('lawyer.case');
    Route::post('agent/addBadge/{agent}', [AgentController::class, 'addBadge'])->name('agent.addBadge');
    Route::get('agent/accept/{agent}', [AgentController::class, 'accept'])->name('agent.accept');
    Route::get('agent/contract/{agent}', [AgentController::class, 'case'])->name('agent.contract');
    Route::post('kazi/addBadge/{kazi}', [KaziController::class, 'addBadge'])->name('kazi.addBadge');
    Route::get('kazi/accept/{kazi}', [KaziController::class, 'accept'])->name('kazi.accept');
    Route::get('kazi/contract/{kazi}', [KaziController::class, 'case'])->name('kazi.contracts');
    Route::post('quiz/{course}',[CourseController::class,'createQuiz'])->name('quiz.store');
    Route::resource('notice', NoticeController::class)->except('show');
    Route::resource('employee',EmployeeController::class);
    Route::resource('agentCategory',AgentCategoryController::class);
    Route::resource('lawyerCategory',LawyerCategoryController::class);
    Route::resource('lawyer',LawyerController::class);
    Route::resource('kazi', KaziController::class);
    Route::resource('agent', AgentController::class);
    Route::post('user-package/{id}',[UserPackageController::class,'store'])->name('user.package');
    Route::prefix('shop')->middleware(['auth', 'verified'])->group(function () {
            Route::resource('productReturn',ProductReturnController::class);
            Route::resource('product', ProductController::class);
            Route::get('order/ongoing',[OrderController::class,'ongoing'])->name('order.ongoing');
            Route::get('order/delivered', [OrderController::class, 'delivered'])->name('order.delivered');
            Route::get('order/history', [OrderController::class, 'history'])->name('order.history');
            Route::resource('order', OrderController::class);
            Route::resource('productCategory', ProductCategoryController::class);
    });
    Route::prefix('courses')->middleware(['auth', 'verified'])->group(function () {
        // Route::get('course/reviews', [CourseController::class, 'courseReview'])->name('course.review');
    Route::resource('contentMedia',ContentMediaController::class);
    Route::resource('courseReview',CourseReviewController::class);
    Route::resource('course', CourseController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('courseOrder', CourseOrderController::class);
    Route::get('course-users',[UserCourseController::class,'index'])->name('course.users');
    Route::get('userCourse/result', [UserCourseController::class, 'quizResult'])->name('userCourse.result');
    Route::get('userCourse/result/{quizAnswer}/{id}', [UserCourseController::class, 'quizResultUpdate'])->name('userCourse.resultUpdate'); 
    Route::post('course/content/add/{course}',[CourseContentController::class,'store'])->name('course.content.add');
    Route::resource('userCourse',UserCourseController::class);
    });
    

   
    Route::prefix('packages')->middleware(['auth', 'verified'])->group(function () {
        Route::get('shopPackage/orders',[ShopPackageController::class,'orders'])->name('shopPackage.orders');
        Route::get('shopPackage/orders/{id}', [ShopPackageController::class, 'orderView'])->name('shopPackage.order-view');
        Route::post('shopPackage/order/{id}', [ShopPackageController::class, 'orderStatus'])->name('shopPackage.order-status');
        Route::resource('shopPackage', ShopPackageController::class);
        Route::resource('package', PackageController::class);
        Route::get('coursePackageOrder',[CoursePackageController::class,'requestList'])->name('package.userCoursePackage.orders');
        Route::get('coursePackageOrder/{packageCourseUser}', [CoursePackageController::class, 'orderShow'])->name('coursePackageUser.show');
        Route::resource('coursePackage',CoursePackageController::class);
        Route::get('packageOrder/{userPackage}', [PackageController::class, 'packageOrder'])->name('packageOrder');
        Route::get('package/users/{package}',[UserPackageController::class,'index'])->name('package.users');
        Route::get('package-Order-approve/{userPackage}', [PackageController::class, 'packageOrderStatus'])->name('packageOrder.approve');
        Route::get('package-Order-cancel/{userPackage}', [PackageController::class, 'packageOrderCancel'])->name('packageOrder.cancel');
        Route::get('package-order-list', [PackageController::class, 'userPackage'])->name('packageOrder.list');
       
        Route::get('professional-package/requests/{id}',[ProfessionalPackageController::class, 'requestView'])->name('professional-package.orderView');
        Route::post('professional-package/requests-status/{id}', [ProfessionalPackageController::class, 'requestStatus'])->name('professional-package.orderStatus');
        Route::get('professional-package/requests', [ProfessionalPackageController::class, 'requests'])->name('professional-package.request');
        Route::resource('professional-package', ProfessionalPackageController::class);
        Route::get('profileStatusBoostPackages/orders',[ProfileStatusBoostPackageController::class,'orders'])->name('profileStatusBoostPackages.orders');
        Route::post('profileStatusBoostPackages/order-satatus/{id}', [ProfileStatusBoostPackageController::class, 'orderStatus'])->name('profileStatusPackage.packageOrder');
        Route::resource('profileStatusBoostPackages',ProfileStatusBoostPackageController::class);
        Route::post('professional-package/service/{professionalPackage}', [ProfessionalPackageController::class, 'service'])->name('professional-package.service');
        Route::post('professional-package/service/update/{packageService}', [ProfessionalPackageController::class, 'serviceUpdate'])->name('professional-package.serviceUpdate');
    });
    Route::resource('blog', BlogController::class);
    Route::resource('services', ServicesController::class);
    
    Route::resource('slider', SliderController::class);
    
    
    Route::resource('country',CountryController::class);
    Route::resource('city',CityController::class);
    Route::resource('badge', BadgeController::class);
    Route::post('badge-user/{id}',[BadgeController::class,'badgeUser'])->name('badge-user');
    Route::post('course-order-status',[CourseOrderController::class, 'changeCourseOrderStatus'])->name('changeCourseOrderStatus');
    Route::post('user/profile/{id}',[UserController::class, 'profileUpdate'])->name('user.profileUpdate');
    Route::post('user/priority/{id}', [UserController::class, 'priority'])->name('user.priority');
    Route::get('change_password/{id}', [UserController::class, 'change_password'])->name('change_password');
    Route::get('user-request', [UserController::class, 'regesitrationRequest'])->name('user.request');
    Route::get('user-control/{id}', [UserController::class, 'control'])->name('user.control');
    Route::get('user-status/{id}/{status}', [UserController::class, 'status'])->name('user.status');
    Route::get('user/accept/{id}', [UserController::class, 'accept'])->name('users.accept');
    Route::get('settings/company_settings', [SettingController::class, 'editCompanySetting'])->name('company.edit');
    Route::post('settings/company_setting', [SettingController::class, 'updateCompanySetting'])->name('company.update');
    Route::get('employee-request', [EmployeeController::class,'request'])->name('employee.request');
    Route::post('order-status/{order}',[OrderController::class,'orderStatus'])->name('order.status');
    Route::post('order-payment/{order}', [OrderController::class, 'orderPayment'])->name('order.payment');
    Route::get('lawyer-request',[LawyerController::class,'requestList'])->name('lawyer.request');
    Route::get('report',[ReportController::class, 'index'])->name('report.index');
    Route::get('kazi-request', [KaziController::class, 'requestList'])->name('kazi.request');
    Route::get('agent-request', [AgentController::class, 'requestList'])->name('agent.request');
   
    Route::delete('remove-media/{media}', function (MediaAlias $media) {
        $media->delete();
        return back()->with('success', 'Media successfully deleted.');
    })->name('remove-media');
    Route::get('getCity/{id}',[CityController::class,'getCity']);
    // Role Permission
    Route::resource('developer/permission', PermissionController::class)->only('index', 'store');
    Route::get('role/assign', [RoleController::class, 'roleAssign'])->name('role.assign');
    Route::post('role/assign', [RoleController::class, 'storeAssign'])->name('store.assign');
    Route::resource('role', RoleController::class);
});
