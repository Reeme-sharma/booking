<?php

use App\Http\Controllers\CustomerController;
use App\Http\Middleware\SP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirmController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/schedules',ScheduleController::class)->middleware('auth');

// Route::get('/detail', function () {
//     return view('firm_details');
// });


Route::middleware('auth')->group(function ()
 {
    Route::resource('/firm',FirmController::class)->middleware(SP::class);
    Route::post('/updateprofilepic',[FirmController::class,'updateprofilepic'])->middleware(SP::class);
    Route::resource('/schedule',ScheduleController::class)->middleware(SP::class);

    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/dashboard',function(){
     $user = Auth::user();
     switch($user->getRoleNames()[0])
     {
        case 'admin':return "ye admin wala hai";
        case 'client':
            if(count($user->getinformation)>0)
            {
                return app(CustomerController::class)->index();
                
            }
            else
            {
                return app(CustomerController::class)->create();
                
            }
        case 'service_provider':
            if(count($user->firm)>0)
                  return app(FirmController::class)->index();
            else
               return app(FirmController::class)->create();
    }
})->middleware('auth')->name('dashboard');

require __DIR__.'/auth.php';
