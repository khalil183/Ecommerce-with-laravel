<?php

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
Auth::routes();
Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('/','Frontend\HomeController@index');
Route::get('/product-details/{slug}','Frontend\HomeController@productDetails')->name('product.details');
Route::get('/category-products/{slug}','Frontend\HomeController@productByCategory')->name('product.by.category');
Route::get('/sub-category-products/{slug}','Frontend\HomeController@productBySubCategory')->name('product.by.sub.category');
Route::get('/brand-products/{slug}','Frontend\HomeController@productByBrand')->name('product.by.brand');
Route::get('/search/','Frontend\HomeController@ProductSearch')->name('product.search');
// orderTrack
Route::post('/order-track','Frontend\HomeController@orderTrack')->name('order.track');


// Route::get('/about-us','Frontend\HomeController@aboutUs')->name('about.us');
// Route::get('/contact-us','Frontend\HomeController@orderTrack')->name('contact.us');

// Profile route
Route::get('/my-profile/','Frontend\ProfileController@myProfile')->name('my.account');
Route::get('/user-informations/','Frontend\ProfileController@userInfo')->name('personal.info');
Route::get('/orders/','Frontend\ProfileController@orderInfo')->name('order-info');
Route::get('/whislist/','Frontend\ProfileController@whislist')->name('whislist');
Route::get('/my-review/','Frontend\ProfileController@myReview')->name('my-review');
Route::get('/add-to-whislist/{id}','Frontend\ProfileController@addWhislist');
Route::get('/remove-whislist/{id}','Frontend\ProfileController@removeWhislist');
Route::post('/subscribe','Frontend\ProfileController@subscribe')->name('subscribe');
Route::post('/un-subscribe','Frontend\ProfileController@unsubscribe')->name('unsubscribe');


// Checkout Route
Route::get('/checkout','Frontend\CheckoutController@viewCheckout')->name('checkout');
Route::post('/shipping-info','Frontend\CheckoutController@storeShippingInfo')->name('store.shipping.info');
Route::get('/stripe-payment','Frontend\CheckoutController@stripe')->name('stripe');
Route::post('/stripe-payment','Frontend\CheckoutController@storeStripe')->name('stripe.post');






// ajax Req
Route::get('/model-view-product/{id}','Frontend\HomeController@modelProductDetails');
// end ajax


Route::get('/cart','Frontend\CartController@viewCart')->name('cart.details');
Route::post('/add-to-cart','Frontend\CartController@addToCart')->name('add.to.cart');
// ajax request
Route::post('/add-cart','Frontend\CartController@addToCartByAjax');
// end ajax
Route::post('/update-cart/{rowId}','Frontend\CartController@updateCart')->name('update.cart');
Route::get('/delete-cart-item/{rowId}','Frontend\CartController@deleteItem')->name('cart.item.delete');
Route::post('/apply-cupon','Frontend\CartController@applyCupon')->name('apply.cupon');






// Admin Part

Route::get('/admin','Admin\Admincontroller@index')->name('admin.dashboard');
Route::get('/admin/login','Admin\Auth\LoginController@shwoAdminLoginForm');
Route::post('/admin/login','Admin\Auth\LoginController@storeLogin')->name('store.admin.login.info');
Route::get('/admin/logout','Admin\Auth\LoginController@adminLogout')->name('admin.logout');
Route::get('/sells-report','Admin\Admincontroller@sellsReport')->name('sellsreport');
Route::post('/today-sells-report','Admin\Admincontroller@todaySellsReport')->name('today.sell.report');
Route::post('/monthly-sells-report','Admin\Admincontroller@monthSellsReport')->name('monthly.sell.report');
Route::post('/yearly-sells-report','Admin\Admincontroller@yearlySellsReport')->name('yearly.sell.report');

// Subscripber
Route::get('/subscriber','Admin\SubscribeController@subscriber')->name('subscriber');



// Category Route

Route::get('/view-categories','Admin\CategoryController@viewCategories')->name('view.categories');
Route::get('/add-category','Admin\CategoryController@showAddCategoryForm')->name('add.category');
Route::post('/store/category','Admin\CategoryController@storeCategory')->name('store.category');
Route::get('/edit-category/{id}','Admin\CategoryController@editCategory')->name('edit.category');
Route::post('/update-category/{id}','Admin\CategoryController@updateCategory')->name('update.category');
Route::get('/delete-category/{id}','Admin\CategoryController@deleteCategory')->name('delete.category');
Route::get('/active-category/{id}','Admin\CategoryController@activeCategory')->name('active.category');
Route::get('/inactive-category/{id}','Admin\CategoryController@inActiveCategory')->name('inactive.category');

// Sub Category Crud

Route::get('/view-sub-categories','Admin\SubCategoryController@viewSubCategories')->name('view.sub.categories');
Route::get('/add-sub-category','Admin\SubCategoryController@showAddSubCategoryForm')->name('add.sub.category');
Route::post('/store-category','Admin\SubCategoryController@storeSubCategory')->name('store.sub.category');
Route::get('/edit-sub-category/{id}','Admin\SubCategoryController@editSubCategory')->name('edit.sub.category');
Route::post('/update-sub-category/{id}','Admin\SubCategoryController@updateSubCategory')->name('update.sub.category');
Route::get('/delete-sub-category/{id}','Admin\SubCategoryController@deleteSubCategory')->name('delete.sub.category');
Route::get('/active-sub-category/{id}','Admin\SubCategoryController@activeSubCategory')->name('active.sub.category');
Route::get('/inactive-sub-category/{id}','Admin\SubCategoryController@inActiveSubCategory')->name('inactive.sub.category');

// Brand Crud

Route::get('/view-brands','Admin\BrandController@viewBrands')->name('view.brand');
Route::get('/add-brand','Admin\BrandController@addBrand')->name('add.brand');
Route::post('/store-brand','Admin\BrandController@storeBrand')->name('store.brand');
Route::get('/edit-brand/{id}','Admin\BrandController@editBrand')->name('edit.brand');
Route::post('/update-brand/{id}','Admin\BrandController@updateBrand')->name('update.brand');
Route::get('/delete-brand/{id}','Admin\BrandController@deleteBrand')->name('delete.brand');
Route::get('/active-brand/{id}','Admin\BrandController@activeBrand')->name('active.brand');
Route::get('/inactive-brand/{id}','Admin\BrandController@inActiveBrand')->name('inactive.brand');


// Product route
Route::get('/view-products','Admin\ProductController@viewProducts')->name('view.products');
Route::get('/add-product','Admin\ProductController@addProduct')->name('add.product');
Route::post('/store-product','Admin\ProductController@storeProduct')->name('store.product');
Route::get('/search-sub-category','Admin\ProductController@searchSubCategory')->name('search.sub.category');
Route::get('/edit-product/{id}','Admin\ProductController@editProduct')->name('edit.product');
Route::post('/update-product/{id}','Admin\ProductController@updateProduct')->name('update.product');
Route::get('/delete-product/{id}','Admin\ProductController@deleteProduct')->name('delete.product');
Route::get('/active-product/{id}','Admin\ProductController@activeProduct')->name('active.product');
Route::get('/inactive-product/{id}','Admin\ProductController@inActiveProduct')->name('inactive.product');
Route::get('/view-product-details/{id}','Admin\ProductController@viewProductDetails')->name('view.product.details');


// Product Offer Route
Route::get('/view-offers','Admin\OfferController@viewOffers')->name('view.offers');
Route::get('/specific/product/offer','Admin\OfferController@specificProductOffer')->name('specific.product.offer');
Route::post('/store/specific/product/offer','Admin\OfferController@storeSpecificProductOffer')->name('store.specific.offer');
Route::get('/edit/specific/product/offer/{id}','Admin\OfferController@editSpecificProductOffer')->name('edit.specifice.offer');
Route::post('/update/specific/product/offer/{id}','Admin\OfferController@updateSpecificProductOffer')->name('update.specifice.offer');

Route::get('/delete/specific/product/offer/{id}','Admin\OfferController@getSpecificProductOffer')->name('delete.specifice.offer');


// All Product Offer Route
Route::get('/view-offers','Admin\OfferController@viewOffers')->name('view.offers');
Route::get('/all/product/offer','Admin\OfferController@allProductOffer')->name('all.product.offer');
Route::post('/store/all/product/offer','Admin\OfferController@storeAllProductOffer')->name('store.all.offer');



// Cupon Route

Route::get('/view/cupon','Admin\CuponController@viewCupon')->name('view.cupon');
Route::get('/add/cupon','Admin\CuponController@addCupon')->name('add.cupon');
Route::post('/store/cupon','Admin\CuponController@storeCupon')->name('store.cupon');
Route::get('/edit/cupon/{id}','Admin\CuponController@editCupon')->name('edit.cupon');
Route::post('/update/cupon/{id}','Admin\CuponController@updateCupon')->name('update.cupon');
Route::get('/delete/cupon/{id}','Admin\CuponController@deleteCupon')->name('delete.cupon');
Route::get('/active/cupon/{id}','Admin\CuponController@activeCupon')->name('active.cupon');
Route::get('/inactive/cupon/{id}','Admin\CuponController@inActiveCupon')->name('inactive.cupon');


// Whislist Route

Route::get('/view/whislist','Admin\WhislistController@viewWhilist')->name('view.whislist');
Route::get('/delete/whislist/{id}','Admin\WhislistController@deleteWhislist')->name('delete.whislist');
Route::get('/active/whislist/{id}','Admin\WhislistController@activeWhislist')->name('active.whislist');
Route::get('/inactive/whislist/{id}','Admin\WhislistController@inActiveWhislist')->name('inactive.whislist');

// Slider Route

Route::get('/view/slider','Admin\SliderController@viewSlider')->name('view.slider');
Route::get('/add/slider','Admin\SliderController@addSlider')->name('add.slider');
Route::post('/store/slider','Admin\SliderController@storeSlider')->name('store.slider');
Route::get('/edit/slider/{id}','Admin\SliderController@editSlider')->name('edit.slider');
Route::post('/update/slider/{id}','Admin\SliderController@updateSlider')->name('update.slider');
Route::get('/delete/slider/{id}','Admin\SliderController@deleteSlider')->name('delete.slider');
Route::get('/active/slider/{id}','Admin\SliderController@activeSlider')->name('active.slider');
Route::get('/inactive/slider/{id}','Admin\SliderController@inActiveSlider')->name('inactive.slider');


// Order Route

Route::get('/all/orders','Admin\OrderController@allOrder')->name('all.orders');
Route::get('/new/orders','Admin\OrderController@viewOrder')->name('new.orders');
Route::get('/view/order/{id}','Admin\OrderController@orderDetails')->name('view.order');
Route::get('/payable/orders/','Admin\OrderController@payableOrder')->name('payable.order');
Route::get('/progress/orders/','Admin\OrderController@progressOrder')->name('progress.order');
Route::get('/delivered/orders/','Admin\OrderController@deliveredOrder')->name('delivered.order');
Route::get('/cancle/orders/','Admin\OrderController@cancleOrder')->name('cancle.order');
Route::get('/order-payment/{id}','Admin\OrderController@orderPayment');
Route::get('/order-progress/{id}','Admin\OrderController@orderProgress');
Route::get('/order-delivered/{id}','Admin\OrderController@orderDelivered');
Route::get('/active-order/{id}','Admin\OrderController@activeOrder');
Route::get('/cancle-order/{id}','Admin\OrderController@orderCancle');









