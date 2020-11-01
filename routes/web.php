<?php 
 
Route::get('/', function () {return view('pages.index');});

    //get sub cate by ajax
Route::get('get/subcategory/{category_id}','Admin\ProductController@GetSubcat');
Route::get('get/subcategory/{category_id}','Admin\SubCategoryPageController@GetSubcatpage');

//auth & user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password/change', 'HomeController@changePassword')->name('password.change');
Route::post('/password/update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::get('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::get('admin-password/reset', 'Admin\ResetPasswordController@reset');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

     //admin section----------------
//--Categories
Route::get('admin/add/category', 'Admin\CategoryController@create')->name('add.category'); 
Route::get('admin/all/category', 'Admin\CategoryController@index')->name('all.category');    
Route::post('admin/store/category', 'Admin\CategoryController@storecatgory')->name('store.category');
Route::get('delete/category/{id}','Admin\CategoryController@DeleteCategory');
Route::get('edit/category/{id}','Admin\CategoryController@EditCategory');
Route::post('update/category/{id}','Admin\CategoryController@UpdateCategory');

//--SubCategories
Route::get('admin/add/subcategory', 'Admin\SubcategoryController@create')->name('add.subcategory'); 
Route::get('admin/all/subcategory', 'Admin\SubcategoryController@index')->name('all.subcategory');    
Route::post('admin/store/subcategory', 'Admin\SubcategoryController@storesubcatgory')->name('store.subcategory');
Route::get('delete/subcategory/{id}','Admin\SubcategoryController@DeleteSubCategory');
Route::get('edit/subcategory/{id}','Admin\SubcategoryController@EditSubCategory');
Route::post('update/subcategory/{id}','Admin\SubcategoryController@UpdateSubCategory');
 
 //sliders routes=====
Route::get('admin/slider/all', 'Admin\SliderController@index')->name('all.slider');
Route::get('admin/slider/add', 'Admin\SliderController@create')->name('add.slider');
Route::post('admin/store/slider', 'Admin\SliderController@store')->name('store.slider');
Route::get('inactive/slider/{id}','Admin\SliderController@Inactive'); 
Route::get('active/slider/{id}','Admin\SliderController@Active');
Route::get('delete/slider/{id}','Admin\SliderController@DeleteSlider');
Route::get('view/slider/{id}','Admin\SliderController@ViewSlider');
Route::get('edit/slider/{id}','Admin\SliderController@EditSlider');
Route::post('update/slider/withoutphoto/{id}','Admin\SliderController@UpdateSliderWithoutPhoto');
Route::post('update/slider/withphoto/{id}','Admin\SliderController@UpdateSliderWithPhoto');

//--coupon
Route::get('admin/add/coupon', 'Admin\CouponController@create')->name('add.coupon'); 
Route::get('admin/all/coupon', 'Admin\CouponController@index')->name('all.coupon');    
Route::post('admin/store/coupon', 'Admin\CouponController@storecoupon')->name('store.coupon');
Route::get('delete/coupon/{id}','Admin\CouponController@DeleteCoupon');
Route::get('edit/coupon/{id}','Admin\CouponController@EditCoupon');
Route::post('update/coupon/{id}','Admin\CouponController@UpdateCoupon');

//--brand
Route::get('admin/add/brand', 'Admin\BrandController@create')->name('add.brand'); 
Route::get('admin/all/brand', 'Admin\BrandController@index')->name('all.brand');    
Route::post('admin/store/brand', 'Admin\BrandController@storebrand')->name('store.brand');
Route::get('delete/brand/{id}','Admin\BrandController@DeleteBrand');
Route::get('edit/brand/{id}','Admin\BrandController@EditBrand');
Route::post('update/brand/{id}','Admin\BrandController@UpdateBrand');

//--blog
Route::get('admin/add/blog', 'Admin\BlogController@create')->name('add.blog'); 
Route::get('admin/all/blog', 'Admin\BlogController@index')->name('all.blog');    
Route::post('admin/store/blog', 'Admin\BlogController@storeblog')->name('store.blog');
Route::get('delete/blog/{id}','Admin\BlogController@DeleteBlog');
Route::get('edit/blog/{id}','Admin\BlogController@EditBlog');
Route::post('update/blogwithoutphoto/{id}','Admin\BlogController@UpdateBlogWithoutPhoto');
Route::post('update/blogwithphoto/{id}','Admin\BlogController@UpdateBlogPhoto');
Route::get('view/blog/{id}','Admin\BlogController@ViewBlog');

//products routes=====
Route::get('admin/product/all', 'Admin\ProductController@index')->name('all.product');
Route::get('admin/product/add', 'Admin\ProductController@create')->name('add.product');
Route::post('admin/store/product', 'Admin\ProductController@store')->name('store.product');
Route::get('inactive/product/{id}','Admin\ProductController@Inactive'); 
Route::get('active/product/{id}','Admin\ProductController@Active');
Route::get('delete/product/{id}','Admin\ProductController@DeleteProduct');
Route::get('view/product/{id}','Admin\ProductController@ViewProduct');
Route::get('edit/product/{id}','Admin\ProductController@EditProduct');
Route::post('update/product/withoutphoto/{id}','Admin\ProductController@UpdateProductWithoutPhoto');
Route::post('update/product/photo/{id}','Admin\ProductController@UpdateProductPhoto');

//--color
Route::get('admin/add/color', 'Admin\ProductController@addcolor')->name('add.color'); 
Route::get('admin/all/color', 'Admin\ProductController@allcolor')->name('all.color');    
Route::post('admin/store/color', 'Admin\ProductController@storecolor')->name('store.color');
Route::get('delete/color/{id}','Admin\ProductController@DeleteColor');
Route::get('edit/color/{id}','Admin\ProductController@EditColor');
Route::post('update/color/{id}','Admin\ProductController@UpdateColor');

//--size
Route::get('admin/add/size', 'Admin\ProductController@addsize')->name('add.size'); 
Route::get('admin/all/size', 'Admin\ProductController@allsize')->name('all.size');    
Route::post('admin/store/size', 'Admin\ProductController@storesize')->name('store.size');
Route::get('delete/size/{id}','Admin\ProductController@DeleteSize');
Route::get('edit/size/{id}','Admin\ProductController@EditSize');
Route::post('update/size/{id}','Admin\ProductController@UpdateSize');


 //subcategorypage routes=====
Route::get('admin/subcategorypages/all', 'Admin\SubCategoryPageController@index')->name('all.subcategorypages');
Route::get('admin/subcategorypages/add', 'Admin\SubCategoryPageController@create')->name('add.subcategorypages');
Route::post('admin/store/subcategorypages', 'Admin\SubCategoryPageController@Store')->name('store.subcategorypages');
Route::get('inactive/subcategorypages/{id}','Admin\SubCategoryPageController@Inactive'); 
Route::get('active/subcategorypages/{id}','Admin\SubCategoryPageController@Active');
Route::get('delete/subcategorypages/{id}','Admin\SubCategoryPageController@DeleteSubcategorypages');
Route::get('view/subcategorypages/{id}','Admin\SubCategoryPageController@ViewSubcategorypages');
Route::get('edit/subcategorypages/{id}','Admin\SubCategoryPageController@EditSubcategorypages');
Route::post('update/subcategorypage/withoutphoto/{id}','Admin\SubCategoryPageController@UpdateSubcategorypageWithoutPhoto');
Route::post('update/subcategorypages/photo/{id}','Admin\SubCategoryPageController@UpdateSubcategorypagePhoto');


 //categorypage routes=====
Route::get('admin/categorypages/all', 'Admin\CategorypageController@index')->name('all.categorypages');
Route::get('admin/categorypages/add', 'Admin\CategorypageController@create')->name('add.categorypages');
Route::post('admin/store/categorypages', 'Admin\CategorypageController@Store')->name('store.categorypages');
Route::get('inactive/categorypages/{id}','Admin\CategorypageController@Inactive'); 
Route::get('active/categorypages/{id}','Admin\CategorypageController@Active');
Route::get('delete/categorypages/{id}','Admin\CategorypageController@DeleteCategorypages');
Route::get('view/categorypages/{id}','Admin\CategorypageController@ViewCategorypages');
Route::get('edit/categorypages/{id}','Admin\CategorypageController@EditCategorypages');
Route::post('update/categorypage/withoutphoto/{id}','Admin\CategorypageController@UpdateCategorypageWithoutPhoto');
Route::post('update/categorypage/photo/{id}','Admin\CategorypageController@UpdateCategorypagePhoto');

//--blog category
Route::get('admin/add/blogcategory', 'Admin\BlogcategoryController@create')->name('add.blogcategory'); 
Route::get('admin/all/blogcategory', 'Admin\BlogcategoryController@index')->name('all.blogcategory');    
Route::post('admin/store/blogcategory', 'Admin\BlogcategoryController@storeblogcategory')->name('store.blogcategory');
Route::get('delete/blogcategory/{id}','Admin\BlogcategoryController@DeleteBlogcategory');
Route::get('edit/blogcategory/{id}','Admin\BlogcategoryController@EditBlogcategory');



//--tag
Route::get('admin/add/tag', 'Admin\TagController@create')->name('add.tag'); 
Route::get('admin/all/tag', 'Admin\TagController@index')->name('all.tag');    
Route::post('admin/store/tag', 'Admin\TagController@storetag')->name('store.tag');
Route::get('delete/tag/{id}','Admin\TagController@DeleteTag');
Route::get('edit/tag/{id}','Admin\TagController@EditTag');
Route::post('update/tag/{id}','Admin\TagController@UpdateTag');




//admin order routes
Route::get('admin/pending/order', 'Admin\OrderController@NewOrder')->name('admin.neworder');
Route::get('admin/view/order/{id}', 'Admin\OrderController@ViewOrder');
Route::get('admin/payment/accept/{id}', 'Admin\OrderController@PaymentAccept');
Route::get('admin/payment/cancel/{id}', 'Admin\OrderController@PaymentCancel');
Route::get('admin/accept/payment', 'Admin\OrderController@AcceptPaymentOrder')->name('admin.accept.payment');
Route::get('admin/progress/payment', 'Admin\OrderController@ProgressPaymentOrder')->name('admin.progress.payment');
Route::get('admin/success/payment', 'Admin\OrderController@SuccessPaymentOrder')->name('admin.success.payment');
Route::get('admin/cancel/payment', 'Admin\OrderController@CancelPaymentOrder')->name('admin.cancel.order');
Route::get('admin/delevery/progress/{id}', 'Admin\OrderController@DeleveryProgress');
Route::get('admin/delevery/done/{id}', 'Admin\OrderController@DeleveryDone');

//report routes
Route::get('admin/today/order', 'Admin\ReportController@TodayOrder')->name('today.order');
Route::get('admin/today/deleverd', 'Admin\ReportController@TodayDelevered')->name('today.delevered');
Route::get('admin/this/month', 'Admin\ReportController@ThisMonth')->name('this.month');
Route::get('admin/search/report', 'Admin\ReportController@search')->name('search.report');
Route::post('admin/search/byyear', 'Admin\ReportController@searchByYear')->name('search.by.year');
Route::post('admin/search/bymonth', 'Admin\ReportController@searchByMonth')->name('search.by.month');
Route::post('admin/search/bydate', 'Admin\ReportController@searchByDate')->name('search.by.date');

//return products admin panel
 Route::get('admin/return/request', 'Admin\ReturnController@request')->name('admin.return.request');
 Route::get('/admin/approve/return/{id}', 'Admin\ReturnController@ApproveReturn');
 Route::get('admin/all/return', 'Admin\ReturnController@AllReturn')->name('admin.all.return');


//--websetting
Route::get('admin/add/websetting', 'Admin\WebsettingController@create')->name('add.websetting'); 
Route::get('admin/all/websetting', 'Admin\WebsettingController@index')->name('all.websetting');    
Route::post('admin/store/websetting', 'Admin\WebsettingController@store')->name('store.websetting');
Route::get('delete/websetting/{id}','Admin\WebsettingController@DeleteSetting');
Route::get('edit/websetting/{id}','Admin\WebsettingController@EditSetting');
Route::post('update/websetting/{id}','Admin\WebsettingController@UpdateSetting');
Route::post('update/websettingwithphoto/{id}','Admin\WebsettingController@UpdateSettingPhoto');

//user role
Route::get('admin/create/role', 'Admin\RoleController@UserRole')->name('create.user.role');
Route::get('admin/create/admin', 'Admin\RoleController@UserCreate')->name('create.admin');
Route::post('admin/store/admin', 'Admin\RoleController@UserStore')->name('store.admin');
Route::get('delete/admin/{id}', 'Admin\RoleController@UserDelete');
Route::get('edit/admin/{id}', 'Admin\RoleController@UserEdit');
Route::post('admin/update/admin', 'Admin\RoleController@UserUpdate')->name('update.admin');

//user profile
Route::get('admin/user/profile', 'Admin\RoleController@user_show')->name('user.profile');
Route::get('admin/edit/profile', 'Admin\RoleController@edit')->name('edit.profile');
Route::post('update/profile', 'Admin\RoleController@update_profile')->name('update.profile');

//--newslater
Route::get('admin/newslater', 'SubscriberController@Newslater')->name('admin.newslater'); 
Route::get('delete/sub/{id}','SubscriberController@DeleteSub'); 
Route::get('admin/seo', 'SeoController@Seo')->name('admin.seo');
Route::post('admin/update/seo', 'SeoController@UpdateSeo')->name('update.seo');


//HomeAdvertise
Route::prefix('/admin')->namespace('Admin')->group(function(){
    Route::resource('header-advertise', 'HeaderAdvertiseController');
});

//stock
Route::get('admin/product/stock', 'StockController@Stock')->name('admin.product.stock');


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    


//frontend all routesa are here--------
Route::post('store/newslater', 'FrontendController@StoreNewslater')->name('store.newslater');

Route::get('/pages/{id}', 'PageController@pageView');
Route::get('/product/details/{id}/{product_name}', 'PageController@ProductView');
Route::post('/cart/product/add/{id}', 'PageController@AddCart');

/* Route::get('/products/{id}', 'PageController@productsView');*/

//electronics
Route::get('product/electronics','PageController@Electronic')->name('product.electronics');
Route::get('page/blog','PageController@blog')->name('blog.post');
Route::get('page/contact','PageController@contact')->name('page.contact');


//wishlists
Route::get('add/wishlist/{id}','WishlistController@AddWishlist');
 
//cart
Route::get('add/to/cart/{id}','CartController@AddCart');
Route::get('check','CartController@check');
Route::get('products/cart','CartController@showCart')->name('show.cart');
Route::get('remove/cart/{rowId}','CartController@removeCart');
Route::post('update/cart/item','CartController@UpdateCart')->name('update.cartitem');
Route::get('cart/product/view/{id}','CartController@ViewProduct');
Route::post('insert/into/cart/','CartController@InsertCart')->name('insert.into.cart');
Route::get('user/checkout/','CartController@Checkout')->name('user.checkout');
Route::get('user/wishlist/','CartController@Wishlist')->name('user.wishlist');
Route::post('user/apply/coupon/','CartController@Coupon')->name('apply.coupon');
Route::get('coupon/remove/','CartController@CouponRemove')->name('coupon.remove');
Route::get('payment/page/','CartController@PymentPage')->name('payment.step');


//payment methods
Route::post('user/payment/process/','PaymentController@payment')->name('payment.process');
Route::post('user/stripe/charge/','PaymentController@STripeCharge')->name('stripe.charge');
//return order
Route::get('success/list/','PaymentController@SuccessList')->name('success.orderlist');
Route::get('request/return/{id}','PaymentController@RequestReturn');

//tracking
Route::post('order/tracking', 'FrontController@OrderTracking')->name('order.tracking');
 Route::post('product/search', 'FrontController@ProductSearch')->name('product.search');