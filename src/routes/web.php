<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\edit_profileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    if (auth()->check()) {
        // If the user is logged in, redirect to /home
        return redirect('/home');
    } else {
        // Otherwise, show the welcome view
        return view('welcome');
    }
});

Route::get('/health', function () {
    return response('OK', 200);
});


Route::middleware(['auth','verified'])->group(function () {
    Route::middleware(['super-admin'])->group(function () {
        Route::view('/pulse', 'pulse::dashboard'); // Assuming Pulse is using a view
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/edit_profiles', [App\Http\Controllers\edit_profileController::class, 'index'])->name('profile');
    Route::post('edit_profiles/updatePassword', [edit_profileController::class, 'updatePassword'])->name('edit_profiles.updatePassword');
    // Route::resource('adm_folder_colors', App\Http\Controllers\adm_folder_colorsController::class);
    // Route::resource('adm_category_colors', App\Http\Controllers\adm_category_colorsController::class);

    


    
    // Route::post('tags/update/{id}', [TagController::class, 'update'])->name('tags.update');
    // Route::resource('folders', App\Http\Controllers\foldersController::class);
    




    Route::resource('pivot_users_flags', App\Http\Controllers\pivot_users_flagsController::class);

    // Route::post('pivot_users_flags', [pivot_users_flagsController::class, 'store'])->name('pivot_users_flags.store');
    // Route::put('pivot_users_flags/{pivot_users_flag}', [pivot_users_flagsController::class, 'update'])->name('pivot_users_flags.update');
    // Route::patch('pivot_users_flags/{pivot_users_flag}', [pivot_users_flagsController::class, 'update']);
    // Route::delete('pivot_users_flags/{pivot_users_flag}', [pivot_users_flagsController::class, 'destroy'])->name('pivot_users_flags.destroy');





    Route::delete('pivot_users_flags/delete', [App\Http\Controllers\pivot_users_flagsController::class, 'destroy'])->name('pivot_users_flags.destroy');


    // Route::get('categories', [categoriesController::class, 'index'])->name('categories.index');
    // Route::get('categories/create', [categoriesController::class, 'create'])->name('categories.create');
    // Route::post('categories', [categoriesController::class, 'store'])->name('categories.store');
    // Route::get('categories/{category}', [categoriesController::class, 'show'])->name('categories.show');
    // Route::get('categories/{category}/edit', [categoriesController::class, 'edit'])->name('categories.edit');
    // Route::put('categories/{category}', [categoriesController::class, 'update'])->name('categories.update');
    // Route::delete('categories/{category}', [categoriesController::class, 'destroy'])->name('categories.destroy');

    // Route::post('categories', App\Http\Controllers\categoriesController::class);

    // Route::get('/right-sidebar-content', function () {
    //     // Forget the cache to force fresh data fetching for this request
    //     Cache::forget('categories_for_user_' . auth()->id());
    //     // Artisan::call('view:clear');
    //     // Return the view with fresh data
    //     return view('layouts.right-sidebar');
    // })->name('right-sidebar.content');

    // Route::get('/right-sidebar-content', function () {
    //     // Forget the cache to force fresh data fetching for this request
    //     Cache::forget('categories_for_user_' . Auth::id());

    //     // Return the view with fresh data and set cache-control headers
    //     return response()
    //         ->view('layouts.right-sidebar')
    //         ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
    //         ->header('Pragma', 'no-cache') // HTTP 1.0.
    //         ->header('Expires', '0'); // Proxies.
    // })->name('right-sidebar.content');

    // Route::post('categories/{category}', 'categoriesController@update');

});
Auth::routes(['verify' => true]);