<?php


Route::get('/', Home::class)->name('home')->middleware('auth');

Route::group(['middleware'=>'guest'], function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});

// Route::livewire('/', 'home')->name('home')->middleware('auth');
// Route::group(['middleware'=>'guest'], function () {
//     Route::livewire('/login', 'login')->name('login');
//     Route::livewire('/register', 'register');
// });
