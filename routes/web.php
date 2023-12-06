<?php


use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Suppliers
    Route::delete('suppliers/destroy', 'SupplierController@massDestroy')->name('suppliers.massDestroy');
    Route::resource('suppliers', 'SupplierController');


    // Add Stock
    Route::delete('stocks/destroy', 'AddStockController@massDestroy')->name('add-stocks.massDestroy');
    Route::resource('stocks', 'AddStockController');
    Route::get('stocks-create-lists', 'AddStockController@index')->name('stocks.index');
    Route::get('stocks-create', 'AddStockController@create')->name('stocks.add');
    Route::post('stocks-store', 'AddStockController@store')->name('stocks.store');
    Route::get('view-stock', 'AddStockController@view')->name('stock.view');
    Route::get('zip-broken', 'AddStockController@zip_broken')->name('stock.zip_broken');
    Route::get('stained-items', 'AddStockController@stained_items')->name('stock.stained_items');
    Route::get('zip-broken-view', 'AddStockController@zip_broken_view')->name('stock.zip_broken.view');
    // Remove Stock
    Route::delete('stocks-remove/destroy', 'RemoveStockController@massDestroy')->name('remove-stocks.massDestroy');
    Route::get('stocks-remove-lists', 'RemoveStockController@index')->name('stocks.remove.index');
    Route::get('stocks-remove', 'RemoveStockController@create')->name('stocks.remove.create');

    // Available Stock
    Route::delete('stocks-available/destroy', 'AvailableStockController@massDestroy')->name('available-stocks.massDestroy');
    Route::resource('stocks-available-', 'AvailableStockController');
    Route::get('stocks-available', 'AvailableStockController@index')->name('available.index');
    Route::get('stocks-view', 'AvailableStockController@view')->name('available.view');

    // Purchase
    Route::delete('purchases/destroy', 'PurchaseController@massDestroy')->name('purchases.massDestroy');
    Route::resource('purchases', 'PurchaseController');

    // Purchase Order
    Route::delete('purchase-order/destroy', 'PurchaseOrderController@massDestroy')->name('purchase-order.massDestroy');
    Route::get('/purchase-order/lists', 'PurchaseOrderController@index')->name('purchase.index');
    Route::get('/purchase-order/create', 'PurchaseOrderController@create')->name('purchase.create');

    // Customer Order
    // Route::delete('customers-order/destroy', 'CustomerOrderController@massDestroy')->name('purchase-order.massDestroy');
    Route::get('/customers-order/lists', 'CustomerOrderController@index')->name('customer-order.index');
    Route::get('/customers-order/create', 'CustomerOrderController@create')->name('customer-order.create');
    Route::get('/customers-order/show', 'CustomerOrderController@show')->name('customer-order.show');
    Route::get('/customers-order/swaps', 'CustomerOrderController@swaps')->name('customer-order.swaps');
    Route::get('/customers-order/swaped_view', 'CustomerOrderController@swaped_view')->name('customer-order.swaped_view');
    Route::get('/customers-order/return', 'CustomerOrderController@return')->name('customer-order.return');
    Route::get('/customers-order/return_view', 'CustomerOrderController@return_view')->name('customer-order.return_view');
    // Product
    Route::delete('products/delete', 'ProductController@delete')->name('products.delete');
    Route::post('products/storeImages', 'ProductController@storeImages')->name('products.storeImages');
    Route::resource('products', 'ProductController');
    Route::get('getProductVariants/{id}','ProductController@getVariantsByProductId')->name('product.getVariants');
    Route::post('products-get', 'ProductController@find')->name('products.get');
    Route::post('products-getVariants', 'ProductController@getVariants')->name('products.getVariants');
    Route::post('products-deleteVariant', 'ProductController@deleteVariant')->name('products.deleteVariant');

});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
