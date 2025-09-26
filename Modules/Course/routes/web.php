<?php

use Illuminate\Support\Facades\Route;
use Modules\Course\App\Http\Controllers\CartController;
use Modules\Course\App\Http\Controllers\PaymentController;
use Modules\Course\App\Http\Controllers\Admin\CourseController;
use Modules\Course\App\Http\Controllers\Admin\EnrollmentController;

use Modules\Course\App\Http\Controllers\Admin\CourseLessonController;
use Modules\Course\App\Http\Controllers\Admin\CourseModuleController;
use Modules\Course\App\Http\Controllers\CourseController as FrontendCourseController;
use Modules\Course\App\Http\Controllers\Instructor\CourseController as InstructorCourseController;


use Modules\Course\App\Http\Controllers\Student\EnrollmentController as StudentEnrollmentController;


use Modules\Course\App\Http\Controllers\Instructor\EnrollmentController as InstructorEnrollmentController;
use Modules\Course\App\Http\Controllers\Instructor\CourseLessonController as InstructorCourseLessonController;
use Modules\Course\App\Http\Controllers\Instructor\CourseModuleController as InstructorCourseModuleController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['HtmlSpecialchars', 'MaintenanceMode']], function(){

    Route::get('courses', [FrontendCourseController::class, 'index'])->name('courses');
    Route::get('course/{slug}', [FrontendCourseController::class, 'show'])->name('course');

    Route::get('instructors', [FrontendCourseController::class, 'instructors'])->name('instructors');
    Route::get('instructors/{slug}', [FrontendCourseController::class, 'instructor_show'])->name('instructor.profile');

    Route::get('/carts', [CartController::class, 'index'])->name('carts');
    Route::get('/add-to-card/{course_id}', [CartController::class, 'store'])->name('add-to-card');
    Route::get('/cart/remove/{courseId}', [CartController::class, 'destroy'])->name('cart-remove');
    
    Route::group(['as' => 'payment.', 'prefix' => 'payment', 'middleware' => ['auth:web']], function(){

        Route::post('/stripe', [PaymentController::class, 'stripe_payment'])->name('stripe');
        Route::post('/bank', [PaymentController::class, 'bank_payment'])->name('bank');

        Route::get('/paypal', [PaymentController::class, 'paypal_payment'])->name('paypal');
        Route::get('/paypal-success-payment', [PaymentController::class, 'paypal_success_payment'])->name('paypal-success-payment');
        Route::get('/paypal-faild-payment', [PaymentController::class, 'paypal_faild_payment'])->name('paypal-faild-payment');

        Route::post('/razorpay', [PaymentController::class, 'razorpay_payment'])->name('razorpay');

        Route::post('/flutterwave', [PaymentController::class, 'flutterwave_payment'])->name('flutterwave');

        Route::post('/paystack', [PaymentController::class, 'paystack_payment'])->name('paystack');

        Route::get('/mollie', [PaymentController::class, 'mollie_payment'])->name('mollie');
        Route::get('/mollie-callback', [PaymentController::class, 'mollie_callback'])->name('mollie-callback');


        Route::get('/instamojo', [PaymentController::class, 'instamojo_payment'])->name('instamojo');
        Route::get('/instamojo-callback', [PaymentController::class, 'instamojo_callback'])->name('instamojo-callback');

        Route::get('/wallet', [PaymentController::class, 'wallet_payment'])->name('wallet');


    });



    Route::group(['as'=> 'student.', 'prefix' => 'student', 'middleware' => ['auth:web']],function (){

        Route::get('transactions', [StudentEnrollmentController::class, 'transactions'])->name('transactions');
        Route::get('invoice/{id}', [StudentEnrollmentController::class, 'invoice'])->name('invoice');
    
        Route::get('enrolled-courses', [StudentEnrollmentController::class, 'enrolled_courses'])->name('enrolled-courses');
        Route::get('enrolled-course/{id}', [StudentEnrollmentController::class, 'enrolled_course'])->name('enrolled-course');
        Route::post('mark-lesson-complete', [StudentEnrollmentController::class, 'mark_lesson_complete'])->name('mark-lesson-complete');
        Route::get('wishlist', [StudentEnrollmentController::class, 'wishlist'])->name('wishlist');
    
        Route::post('/store-review/{course_id}', [StudentEnrollmentController::class, 'store_review'])->name('store-review');
    
        Route::get('/download-certificate/{course_id}', [StudentEnrollmentController::class, 'download_certificate'])->name('download-certificate');
    
    });



    
    Route::group(['as'=> 'instructor.', 'prefix' => 'instructor', 'middleware' => ['auth:web', 'CheckInstructor']],function (){

        Route::resource('courses', InstructorCourseController::class)->names('courses');
        Route::get('course-media/{course_id}', [InstructorCourseController::class, 'course_media'])->name('course-media');
        Route::post('course-media-update/{course_id}', [InstructorCourseController::class, 'course_media_update'])->name('course-media-update');

        Route::get('course-seo/{course_id}', [InstructorCourseController::class, 'course_seo'])->name('course-seo');
        Route::post('course-seo-update/{course_id}', [InstructorCourseController::class, 'course_seo_update'])->name('course-seo-update');

        Route::get('active-course', [InstructorCourseController::class, 'active_course'])->name('active-course');
        Route::get('draft-course', [InstructorCourseController::class, 'draft_course'])->name('draft-course');
        Route::get('pending-course', [InstructorCourseController::class, 'pending_course'])->name('pending-course');
        Route::get('rejected-course', [InstructorCourseController::class, 'rejected_course'])->name('rejected-course');

        Route::get('submit-for-review/{course_id}', [InstructorCourseController::class, 'submit_for_review'])->name('submit-for-review');
        Route::post('store-submit-review/{course_id}', [InstructorCourseController::class, 'store_submit_review'])->name('store-submit-review');

        Route::get('course-curriculum/{course_id}', [InstructorCourseModuleController::class, 'index'])->name('course-curriculum');
        Route::post('store-course-curriculum/{course_id}', [InstructorCourseModuleController::class, 'store'])->name('store-course-curriculum');
        Route::put('update-course-curriculum/{course_id}/{course_module}', [InstructorCourseModuleController::class, 'update'])->name('update-course-curriculum');
        Route::delete('destroy-course-curriculum/{course_id}/{course_module}', [InstructorCourseModuleController::class, 'destroy'])->name('destroy-course-curriculum');

        Route::get('course-lesson/{course_id}/{course_module}', [InstructorCourseLessonController::class, 'index'])->name('course-lesson');
        Route::post('store-course-lesson/{course_module_id}', [InstructorCourseLessonController::class, 'store'])->name('store-course-lesson');
        Route::put('update-course-lesson/{course_module_id}/{module_lesson_id}', [InstructorCourseLessonController::class, 'update'])->name('update-course-lesson');
        Route::delete('destroy-course-lesson/{course_module_id}/{module_lesson_id}', [InstructorCourseLessonController::class, 'destroy'])->name('destroy-course-lesson');

        Route::get('course-enrollments', [InstructorEnrollmentController::class, 'index'])->name('course-enrollments');
        Route::get('course-enrollment/{order_id}', [InstructorEnrollmentController::class, 'show'])->name('course-enrollment');


    });


});



Route::group(['as'=> 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin']],function (){

    Route::resource('courses', CourseController::class)->names('courses');
    Route::get('course-media/{course_id}', [CourseController::class, 'course_media'])->name('course-media');
    Route::post('course-media-update/{course_id}', [CourseController::class, 'course_media_update'])->name('course-media-update');

    Route::get('course-seo/{course_id}', [CourseController::class, 'course_seo'])->name('course-seo');
    Route::post('course-seo-update/{course_id}', [CourseController::class, 'course_seo_update'])->name('course-seo-update');

    Route::get('active-course', [CourseController::class, 'active_course'])->name('active-course');
    Route::get('pending-course', [CourseController::class, 'pending_course'])->name('pending-course');
    Route::get('rejected-course', [CourseController::class, 'rejected_course'])->name('rejected-course');

    Route::get('submit-for-review/{course_id}', [CourseController::class, 'submit_for_review'])->name('submit-for-review');
    Route::post('course-approved/{course_id}', [CourseController::class, 'course_approved'])->name('course-approved');
    Route::post('course-rejected/{course_id}', [CourseController::class, 'course_rejected'])->name('course-rejected');

    Route::get('course-curriculum/{course_id}', [CourseModuleController::class, 'index'])->name('course-curriculum');
    Route::post('store-course-curriculum/{course_id}', [CourseModuleController::class, 'store'])->name('store-course-curriculum');
    Route::put('update-course-curriculum/{course_id}/{course_module}', [CourseModuleController::class, 'update'])->name('update-course-curriculum');
    Route::delete('destroy-course-curriculum/{course_id}/{course_module}', [CourseModuleController::class, 'destroy'])->name('destroy-course-curriculum');

    Route::get('course-lesson/{course_id}/{course_module}', [CourseLessonController::class, 'index'])->name('course-lesson');
    Route::post('store-course-lesson/{course_module_id}', [CourseLessonController::class, 'store'])->name('store-course-lesson');
    Route::put('update-course-lesson/{course_module_id}/{module_lesson_id}', [CourseLessonController::class, 'update'])->name('update-course-lesson');
    Route::delete('destroy-course-lesson/{course_module_id}/{module_lesson_id}', [CourseLessonController::class, 'destroy'])->name('destroy-course-lesson');

    Route::get('course-enrollments', [EnrollmentController::class, 'index'])->name('course-enrollments');
    Route::get('course-pending-payment', [EnrollmentController::class, 'course_pending_payment'])->name('course-pending-payment');
    Route::get('course-rejected-payment', [EnrollmentController::class, 'course_rejected_payment'])->name('course-rejected-payment');
    Route::get('course-enrollment/{order_id}', [EnrollmentController::class, 'show'])->name('course-enrollment');

    Route::post('enrollment-payment-approved/{order_id}', [EnrollmentController::class, 'enrollment_payment_approved'])->name('enrollment-payment-approved');
    Route::post('enrollment-payment-rejected/{order_id}', [EnrollmentController::class, 'enrollment_payment_rejected'])->name('enrollment-payment-rejected');
    Route::delete('course-enrollment-delete/{order_id}', [EnrollmentController::class, 'destroy'])->name('course-enrollment-delete');

    Route::get('earning-and-revenue', [EnrollmentController::class, 'earning_and_revenue'])->name('earning-and-revenue');

});


