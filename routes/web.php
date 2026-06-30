<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\RenterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Make sure you have the verify-email route
Route::get('/verify-email', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

    Route::get('/', [RenterController::class, 'categories']);


//ADMIN CONTROLLER ROUTES //

// route to open homepage



//route to open addcategory page

Route::middleware(['auth', 'user'])->group(function () {

    Route::get('/user', function () {
        return view('User.index');
    });

       Route::get('/terms', function () {
        return view('User.Privacyandpolicy');
    });

       Route::get('/becomeownerui', function () {
        return view('User.becomeownerui');
    });


    Route::get('/becomeownerform', function () {
        return view('BecomeOwner');
    });


    Route::get('/become-owner',
        [AdminController::class, 'create']);

    Route::post('/become-owner',
        [AdminController::class, 'store']);

    Route::get('/item/{id}', [RenterController::class, 'showItem']);

Route::post(
    '/item/{id}/book',
    [RenterController::class,'store']
);

Route::get(
    '/my-bookings',
    [RenterController::class,'myBookings']
);

Route::get(
'/booking/{id}',
[RenterController::class,'bookingDetails']
);


Route::post(
        '/wishlist/{id}',
        [RenterController::class,'addToWishlist']
    );

    Route::get(
        '/wishlist',
        [RenterController::class,'wishlist']
    );

    Route::post(
        '/wishlist/remove/{id}',
        [RenterController::class,'removeWishlist']
    );

    Route::post(
    '/booking/{id}/review',
    [RenterController::class,'submitReview']
);

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
           if ($role === 'owner') {
            return redirect('/');
        }

        abort(403, 'Unauthorized');

    })->name('dashboard');

});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/goadmin', [AdminController::class, 'dashboard']);

   


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


    Route::get('/users', [AdminController::class, 'users']);
Route::get('/users/view/{id}', [AdminController::class, 'viewUser']);
Route::get('/users/edit/{id}', [AdminController::class, 'editUser']);

Route::post('/users/update/{id}', [AdminController::class, 'updateUser']);
Route::post('/users/delete/{id}', [AdminController::class, 'deleteUser']);

Route::get('/admin/owner-requests',
    [AdminController::class, 'OwnerRequests']);

Route::post('/admin/owner-requests/{id}/approve',
    [AdminController::class, 'approve']);

Route::post('/admin/owner-requests/{id}/reject',
    [AdminController::class, 'reject']);



Route::get('/admin/item-requests',
    [AdminController::class, 'itemRequests']);

Route::post('/admin/items/{id}/approve',
    [AdminController::class, 'approveItem']);

Route::post('/admin/items/{id}/reject',
    [AdminController::class, 'rejectItem']);

Route::get('/admin/bookings', [AdminController::class, 'bookings']);

Route::get('/admin/bookings/view/{id}', [AdminController::class, 'viewBooking']);

Route::get('/admin/bookings/edit/{id}', [AdminController::class, 'editBooking']);

Route::post('/admin/bookings/update/{id}', [AdminController::class, 'updateBooking']);

Route::post('/admin/bookings/delete/{id}', [AdminController::class, 'deleteBooking']);

Route::get('/admin/items', [AdminController::class, 'items']);

Route::get('/admin/items/view/{id}', [AdminController::class, 'viewItem']);

Route::get('/admin/items/edit/{id}', [AdminController::class, 'editItem']);

Route::post('/admin/items/update/{id}', [AdminController::class, 'updateItem']);

Route::post('/admin/items/delete/{id}', [AdminController::class, 'deleteItem']);

Route::get('/admin/reviews', [AdminController::class, 'reviews']);

Route::get('/admin/reviews/view/{id}', [AdminController::class, 'viewReview']);

Route::get('/admin/reviews/edit/{id}', [AdminController::class, 'editReview']);

Route::post('/admin/reviews/update/{id}', [AdminController::class, 'updateReview']);

Route::post('/admin/reviews/delete/{id}', [AdminController::class, 'deleteReview']);

Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

Route::get('/admin/notifications', [AdminController::class, 'notifications']);

Route::get('/admin/notifications/read/{id}', [AdminController::class, 'readNotification']);

Route::post('/admin/notifications/delete/{id}', [AdminController::class, 'deleteNotification']);
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

<<<<<<< HEAD
    Route::get(
    '/owner/bookings',
    [OwnerController::class,'bookingRequests']
);

Route::get(
    '/owner/booking/{id}',
    [OwnerController::class,'bookingDetails']
);

Route::post(
    '/owner/bookings/{id}/approve',
    [OwnerController::class,'approveBooking']
);

Route::post(
    '/owner/bookings/{id}/reject',
    [OwnerController::class,'rejectBooking']
);

Route::post(
    '/owner/booking/{id}/give',
    [OwnerController::class,'giveToUser']
);

Route::post(
    '/owner/booking/{id}/returned',
    [OwnerController::class,'markReturned']
);

=======
});


Route::get('/goowner', function () {
    return view('Vendor.index');
});
Route::get('/goownersignin', function () {
    return view('Vendor.signin');
});
Route::get('/goownersignup', function () {
    return view('Vendor.signup');
>>>>>>> e799d6de814e7ea86b2fd73a772079113e8ae090
});