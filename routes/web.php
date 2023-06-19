<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationTestController;

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


    // User::create([
    //     'name' => 'Test user',
    //     'email' => 'test@test.at',
    //     'password' => bcrypt('test'),
    // ]);

    auth()->login(User::first());


    return view('welcome');
});



Route::get('/send-notification', [NotificationTestController::class, 'sendNotification'])->name('send.notification');
