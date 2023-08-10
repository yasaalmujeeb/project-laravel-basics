<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
Route::view('/register','register');
Route::view('/login','login');
Route::view('/adminlogin','adminlogin');
Route::controller(UserController::class)->group(function()
{
   
   Route::post('/adminauth','adminAuth')->name('admin.auth');
   Route::get('/admin','admin')->name('admin.page')->middleware('adminguard');
   Route::get('adminlogout','adminlogout')->name('admin.logout')->middleware('adminguard');
   Route::get('/deleteuser/{id}','deleteuser')->name('delete.user');
   Route::post('/registeruser','register')->name('register.user');//insert
   Route::post('/loginuser','login')->name('login.user');//view
   Route::get('/logout','logout')->name('logout.user');//exit 
});

Route::get('/blog',[PostController::class,'index'])->middleware('guard');
Route::get('/createpage',[PostController::class,'create'])->middleware('guard');
Route::get('/adminviewpost/{id}',[PostController::class,'adminviewpost'])->name('admin.view')->middleware('adminguard');
Route::post('/post',[PostController::class,'store'])->name('createpost.user')->middleware('guard');
Route::get('/update/{id}',[PostController::class,'edit'])->name('updatepost.page')->middleware('guard');
Route::put('/updatepost/{id}',[PostController::class,'update'])->name('updatepost.user')->middleware('guard');
Route::get('/delete/{id}',[PostController::class,'destroy'])->name('deletepost.user')->middleware('guard');

Route::get('/no_access',function(){
    echo "<h1>you have not any access on this page firstly register then come.</h1>";
});

