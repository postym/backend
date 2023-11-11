<?php

use App\Http\Controllers\Api\CarouselItemsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/carousel', 
[CarouselItemsController::class, 'index']
);
Route::get('/carousel/{id}',
[CarouselItemsController::class, 'show']
);
Route::delete('/carousel/{id}',
[CarouselItemsController::class, 'destroy']
);
Route::post('/carousel',
[CarouselItemsController::class, 'store']
);
Route::put('/carousel/{id}',
[CarouselItemsController::class, 'update']
);



Route::get('/user', 
[UserController::class, 'index']
);
Route::delete('/user/{id}',
[UserController::class, 'destroy']
);
Route::get('/user/{id}',
[UserController::class, 'show']
);
Route::post('/user',
[UserController::class, 'store']
)->name('user.store');
Route::put('/user/{id}',
[UserController::class, 'update']
)->name('user.update');
Route::put('/user/email/{id}',
[UserController::class, 'email']
)->name('user.email');
Route::put('/user/password/{id}',
[UserController::class, 'password']
)->name('user.password');




//User
Route::get('/message', [MessageController::class, 'index']);
//show
Route::get('/message/{id}', [MessageController::class, 'show']);
//delete
Route::delete('/message/{id}', [MessageController::class, 'destroy']);
//store
Route::post('/message', [MessageController::class, 'store']);

