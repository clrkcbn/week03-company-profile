<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| These routes map incoming client requests to the CompanyController.
| Each route is a GET request that returns a Blade view for one of the
| four required pages of the Company Profile Website. Naming the routes
| lets us reference them by name (e.g. route('about')) instead of hard
| -coding URLs inside our Blade templates.
|
*/

Route::get('/', [CompanyController::class, 'home'])->name('home');

Route::get('/about', [CompanyController::class, 'about'])->name('about');

Route::get('/services', [CompanyController::class, 'services'])->name('services');

Route::get('/contact', [CompanyController::class, 'contact'])->name('contact');
