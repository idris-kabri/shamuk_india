<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Register;
use App\Livewire\Admin\DashboardComponent;
use App\Livewire\Admin\Lead\Create;
use App\Livewire\Admin\Lead\Index as LeadIndex;
use App\Livewire\Admin\Lead\Logs;
use App\Livewire\Admin\Lead\Myleads;
use App\Livewire\Admin\Role\Index;
use App\Livewire\Admin\ServiceType\Index as ServiceTypeIndex;
use App\Livewire\Admin\User\Index as UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('welcome');
});

Route::get('/login', [Login::class, 'index'])->name('login');
Route::post('/login-store', [Login::class, 'store'])->name('login-store');
Route::get('/register', [Register::class, 'index'])->name('register');
Route::post('/register-store', [Register::class, 'store'])->name('register-store');


Route::middleware('auth')->group(function () {
   Route::get('/logout', [Login::class, 'logout'])->name('logout');
   Route::get('/dashboard', DashboardComponent::class)->name('dashboard');

   Route::prefix('roles')->name('roles.')->group(function () {
      Route::get('index', Index::class)->name('index');
   });

   Route::prefix('users')->name('users.')->group(function () {
      Route::get('index', UserIndex::class)->name('index');
   });

   Route::prefix('service-type')->name('service-type.')->group(function () {
      Route::get('index', ServiceTypeIndex::class)->name('index');
   });

   Route::prefix('leads')->name('leads.')->group(function () {
      Route::get('index', LeadIndex::class)->name('index');
      Route::get('create', Create::class)->name('create');
      Route::get('logs/{id}', Logs::class)->name('logs');
      Route::get('mine', Myleads::class)->name('mine');
   });
});
