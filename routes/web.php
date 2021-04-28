<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\CollegeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::view('/', 'welcome')->name('welcome');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::view('login', 'admin.login')->name('admin.login');
        Route::post('login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.auth');
    });

    Route::group(['middleware' => 'admin.auth'], function () {
        Route::view('dashboard', 'admin.home')->name('admin.home');
        Route::post('logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');

        // Profile

        Route::get('/profile', [AdminController::class, 'profile']);
        Route::get('/profile/{id}/edit', [AdminController::class, 'profileedit']);
        Route::put('/profile/{id}', [AdminController::class, 'profileupdate'])->name('profile.update');

        // skills list

        Route::get('/skills', [SkillController::class, 'index']);
        Route::get('/skills/create', [SkillController::class, 'create']);
        Route::post('/skills/create', [SkillController::class, 'store']);
        Route::get('/skills/{skill}/edit', [SkillController::class, 'edit']);
        Route::put('/skills/{skill}', [SkillController::class, 'update'])->name('skill.update');
        Route::delete('/skills/{skill}', [SkillController::class, 'destroy'])->name('skill.destroy');

        // colleges lists routes

        Route::get('/colleges', [CollegeController::class, 'index']);
        Route::get('/colleges/create', [CollegeController::class, 'create']);
        Route::post('/colleges/create', [CollegeController::class, 'store']);
        Route::get('/colleges/{college}/edit', [CollegeController::class, 'edit']);
        Route::put('/colleges/{college}', [CollegeController::class, 'update'])->name('college.update');
        Route::delete('/colleges/{college}', [CollegeController::class, 'destroy'])->name('college.destroy');
    });
});

// Professional

Route::group(['prefix' => 'professional'], function () {
    Route::group(['middleware' => 'professional.guest'], function () {
        Route::post('login', [App\Http\Controllers\ProfessionalController::class, 'login'])->name('professional.auth');
        Route::view('register', 'professional.register')->name('professional.register');
        Route::post('register', [App\Http\Controllers\ProfessionalController::class, 'register'])->name('professional.register');
    });

    Route::group(['middleware' => 'professional.auth'], function () {
        // Route::view('home', 'professional.home')->name('professional.home');
        Route::get('home', [ProfessionalController::class, 'showdata'])->name('professional.home');
        Route::post('logout', [App\Http\Controllers\ProfessionalController::class, 'logout'])->name('professional.logout');

        // Profile

        Route::get('/profile', [ProfessionalController::class, 'profile']);
        Route::get('/profile/{id}/edit', [ProfessionalController::class, 'profileedit']);
        Route::put('/profile/{id}', [ProfessionalController::class, 'profileupdate'])->name('proprofile.update');
    });
});


Route::group(['middleware' => 'auth'], function () {

    // Route::get('/profile', [AdminController::class, 'stdprofile']);
    Route::get('/profile/{id}/edit', [HomeController::class, 'stdprofileedit']);
    Route::put('/profile/{id}', [HomeController::class, 'stdprofileupdate'])->name('stdprofile.update');
});
