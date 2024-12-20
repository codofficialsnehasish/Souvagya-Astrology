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
    EnquiryController,
    ServiceController,
    CategoryController,
    ProductController,
    MagazineControllers,
};

use App\Http\Controllers\LocationController;

use App\Http\Controllers\Site\{
    HomeController,
    Authentication,
    UserDashboard,
    AboutController,
    ContactController,
    AstrologersController,
    ServicesController,
    ShopsController,
    MagazineController,
    NewsletterSubscription,
    CartController,
    Checkout,
};

// ========================= Site Routes ==========================

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/astrologers',[AstrologersController::class,'index'])->name('astrologers');

Route::get('/services',[ServicesController::class,'index'])->name('services');
Route::get('/services-details/{slug}',[ServicesController::class,'service_details'])->name('services.details');

Route::get('/shops',[ShopsController::class,'index'])->name('shops');
Route::get('/shops-details/{slug}',[ShopsController::class,'product_details'])->name('shops.details');

Route::get('/magazine',[MagazineController::class,'index'])->name('magazine');

Route::get('/contact-us',[ContactController::class,'index'])->name('contact-us');
Route::post('/contact-us-enquiry',[ContactController::class,'store'])->name('contact-us-enquiry');

Route::post('/newsletter-subscribe',[NewsletterSubscription::class,'store'])->name('newsletter-subscribe');

Route::post('/astrologer-booking', [HomeController::class, 'astrologer_booking'])->name('astrologer-booking');

Route::post('/send-verification-code', [Authentication::class, 'sendVerificationCode'])->name('send-verification-code');
Route::post('/verify-code', [Authentication::class, 'verifyCode'])->name('verify-code');
Route::post('/process-submit-details',[Authentication::class,'process_submit_details'])->name('process-submit-details')->middleware('auth');
Route::get('/user-logout',[Authentication::class,'user_logout'])->name('user-logout')->middleware('auth');
Route::post('/process-update-profile',[Authentication::class,'process_update_profile'])->name('process-update-profile')->middleware('auth');

Route::get('/user-dashboard',[UserDashboard::class,'index'])->name('user-dashboard')->middleware('auth');


Route::get('cart',[CartController::class, 'index'])->name('cart');
Route::post('/cart/add-to-cart', [CartController::class, 'add_to_cart'])->name('add-to-cart');
Route::get('/cart/count', [CartController::class, 'cartCount'])->name('cart.count');
Route::get('/cart/total', [CartController::class, 'sum_cart_total'])->name('cart.total');
Route::patch('/cart/{id}', [CartController::class, 'updateCartQuantity'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'deleteCartItem'])->name('cart.delete');


Route::get('checkout',[Checkout::class, 'index'])->name('checkout');
Route::post('checkout/process',[Checkout::class, 'process_checkout'])->name('checkout.process');





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
        Route::get('astrologers/{id}/delete-certificate-image',[AstrologerController::class,'delete_certificate_image'])->name('astrologers.delete-certificate-image');

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

        Route::resource('enquiry',EnquiryController::class);
        Route::get('enquirys/todays-enquiry',[EnquiryController::class,'todays_enquiry'])->name('enquirys.todays-enquiry');

        Route::resource('services',ServiceController::class);

        Route::resource('magazines',MagazineControllers::class);

        Route::resource('category', CategoryController::class);

        Route::controller(ProductController::class)->group( function () {
            Route::prefix('product')->group( function () {
                Route::get('','index')->name('product.index');
                Route::post('get-products-by-category','get_products_by_category_id')->name('products.get-products-by-category');
                Route::post('update-product-stock','update_product_stock')->name('products.update-product-stock');
                Route::get('basic-info-create','basic_info_create')->name('products.basic-info-create');
                Route::post('basic-info-process','basic_info_process')->name('products.add-basic-info');

                Route::get('basic-info-edit/{id?}','basic_info_edit')->name('products.basic-info-edit');
                Route::post('basic-info-edit-process','basic_info_edit_process')->name('products.add-basic-edit-info');

                Route::get('price-edit/{id?}','price_edit')->name('products.price-edit');
                Route::post('price-edit-process','price_edit_process')->name('products.price-edit-process');

                
                Route::get('inventory-edit/{id?}','inventory_edit')->name('products.inventory-edit');
                Route::post('inventory-edit-process','inventory_edit_process')->name('products.inventory-edit-process');
                
                Route::get('variation-edit/{id?}','variation_edit')->name('products.variation-edit');
                Route::post('variation-edit-process','variation_edit_process')->name('products.variation-edit-process');
                
                Route::get('product-images-edit/{id?}','product_images_edit')->name('products.product-images-edit');
                Route::post('product-gallery-save','productGalleryStore')->name('products.product-gallery-save');
                Route::post('get-product-temp-images','productTempImages')->name('products.get-product-temp-images');
                Route::post('delete-product-images','delete_product_media')->name('products.delete-product-images');
                Route::post('set-main-product-image','set_main_product_image')->name('products.set-main-product-image');
                Route::post('product-images-process','product_images_process')->name('products.product-images-process');


                Route::get('product-addons-edit/{id?}','product_addons_edit')->name('products.product-addons-edit');
                Route::post('product-addons-update','product_addons_update')->name('products.product-addons-update');

                Route::delete('delete/{id}','destroy')->name('products.delete');
            });
        });
    });
    Route::post('booking/check-astrologer-availability',[BookingController::class,'check_astrologer_availability'])->name('booking.check-astrologer-availability');
    
    
});




Route::post('get-state-list',[LocationController::class,'get_state_list'])->name('get-state-list');
Route::post('get-city-list',[LocationController::class,'get_city_list'])->name('get-city-list');