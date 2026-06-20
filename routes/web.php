<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\RenterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//ADMIN CONTROLLER ROUTES //

// route to open homepage

Route::get('/', function () {
    return view('User.index');
});



//route to open addcategory page

Route::middleware(['auth', 'user'])->group(function () {

    Route::get('/user', function () {
        return view('User.index');
    });

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {

        $role = Auth::user()->role;

        if ($role === 'admin') {
            return redirect('/goadmin');
        }

        if ($role === 'user') {
            return redirect('/');
        }

        abort(403, 'Unauthorized');

    })->name('dashboard');

});

Route::middleware(['auth', 'admin'])->group(function () {

Route::get('/goadmin', function () {
    return view('Admin.index');
});
   
Route::get('/admin/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/addcategory', function () {
        return view('Admin.Addcategories');
    });

    // route to add a category

    Route::post('/admin/category/store', [AdminController::class, 'storeCategory']);

    // route to display all categories on categories page

    Route::get('/admin/categories', [AdminController::class, 'categories']);

    // route to open category edit page with values

    Route::get('/admin/category/{id}/edit', [AdminController::class, 'editCategory']);

    //route to update categories

    Route::post('/admin/category/{id}/update', [AdminController::class, 'updateCategory']);

    //route to delete a category

    Route::delete('/admin/category/{id}', [AdminController::class, 'deleteCategory']);

});

Route::middleware(['auth', 'owner'])->group(function () {

    //OWNER CONTROLLER

    // route to open create items page with all categories names fetched in select box

    Route::get('/owner/items/create', [OwnerController::class, 'createItem']);

    //route to save items in database

    Route::post('/owner/items/store', [OwnerController::class, 'storeItem']);

    // route to open create items page

    Route::get('/owner/items', [OwnerController::class, 'items']);

    //rote to open edit item page with previous values in its field

    Route::get('/owner/item/{id}/edit', [OwnerController::class, 'editItem']);

    //route to update items

    Route::post('/owner/item/{id}/update', [OwnerController::class, 'updateItem']);

    //route to delete items

    Route::delete('/owner/item/{id}', [OwnerController::class, 'deleteItem']);

});