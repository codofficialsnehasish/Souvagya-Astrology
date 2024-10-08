<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    AuthController,
    Dashboard,
    EmployeesController,
    RoleController,
    PermissionController,
    AstrologerController,
    BookingController,
    AttendanceController,
};

use App\Http\Controllers\LocationController;

use App\Http\Controllers\Site\{
    HomeController,
    Authentication,
    UserDashboard,
};

// ========================= Site Routes ==========================

Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('/send-verification-code', [Authentication::class, 'sendVerificationCode'])->name('send-verification-code');
Route::post('/verify-code', [Authentication::class, 'verifyCode'])->name('verify-code');
Route::post('/process-submit-details',[Authentication::class,'process_submit_details'])->name('process-submit-details')->middleware('auth');
Route::get('/user-logout',[Authentication::class,'user_logout'])->name('user-logout')->middleware('auth');
Route::post('/process-update-profile',[Authentication::class,'process_update_profile'])->name('process-update-profile')->middleware('auth');

Route::get('/user-dashboard',[UserDashboard::class,'index'])->name('user-dashboard')->middleware('auth');


// ======================== Admin Routes =============================

Route::get('/login',[AuthController::class,'login'])->name('admin.login');
Route::prefix('admin')->group( function (){
    Route::get('/login',[AuthController::class,'login']);
    Route::post('/login',[AuthController::class,'process_login'])->name('admin.login.process');

    Route::middleware('auth')->group( function (){
        Route::get('/logout',[AuthController::class,'logout'])->name('admin.logout');
        Route::get('/profile',[AuthController::class,'profile'])->name('profile');
        Route::post('/update-profile',[AuthController::class,'update_profile'])->name('profile.update-profile');
        Route::get('/change-password',[AuthController::class,'change_password'])->name('admin.change-password');
        Route::post('/process-change-password',[AuthController::class,'process_change_password'])->name('admin.process-change-password');
        
        Route::get('/dashboard',[Dashboard::class,'dashboard'])->name('dashboard');



        Route::controller(RoleController::class)->group(function () {
            Route::prefix('role')->group(function () {
                Route::get("/",'roles')->name('roles');
                Route::post("/create-role",'create_role')->name('role.create');
                Route::post("{roleId}/update-role",'update_role')->name('role.update');
                Route::put("/{roleId}/destroy-role",'destroy_role')->name('role.destroy');
                Route::get("/{roleId}/add-permission-to-role",'addPermissionToRole')->name('role.addPermissionToRole');
                Route::post("/{roleId}/give-permissions",'givePermissionToRole')->name('role.give-permissions');
            });
        });

        Route::controller(PermissionController::class)->group(function () {
            Route::prefix('permission')->group(function () {
                Route::get("/",'permission')->name('permission');
                Route::post("/create-permission",'create_permission')->name('permission.create');
                Route::post("{permissionId}/update-permission",'update_permission')->name('permission.update');
                Route::put("/{permissionId}/destroy-permission",'destroy_permission')->name('permission.destroy');
            });
        });

        Route::controller(EmployeesController::class)->group(function () {
            Route::prefix('employees')->group(function () {
                Route::get('/','index')->name('employee');
                Route::get('/add-new','add_new')->name('employee.add');
                Route::post('/add-new/process','process')->name('employee.add.process');
                Route::get('/edit/{id}','edit')->name('employee.edit');
                Route::post('/update','update_process')->name('employee.update');
                Route::get('/delete/{id}','delete')->name('employee.delete');
            });
        });

        Route::resource('astrologer',AstrologerController::class);

        Route::resource('bookings',BookingController::class);
        Route::get('booking/today-bookings',[BookingController::class,'today_bookings'])->name('booking.today-bookings');
        Route::get('booking/today-appointments',[BookingController::class,'today_appointments'])->name('booking.today-appointments');
        Route::post('booking/process-prescription',[BookingController::class,'process_prescription'])->name('booking.process-prescription');
        Route::get('booking/{id}/delete-prescription-documents',[BookingController::class,'delete_prescription_documents'])->name('booking.delete-prescription-documents');
        Route::get('booking/{id}/delete-prescription-note',[BookingController::class,'delete_prescription_note'])->name('booking.delete-prescription-note');

        Route::controller(AttendanceController::class)->group(function () {
            Route::prefix('attendance')->group(function () {
                Route::get('/','index')->name('attendance');
                Route::get('/todays-attendance','todays_attendance')->name('attendance.todays-attendance');
            });
        });
    });
    
    
});




Route::post('get-state-list',[LocationController::class,'get_state_list'])->name('get-state-list');
Route::post('get-city-list',[LocationController::class,'get_city_list'])->name('get-city-list');