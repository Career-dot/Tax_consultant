<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::prefix('services')->name('services.')->group(function () {
    Route::get('/iris-profile-update', function () {
        return view('services.iris');
    })->name('iris');

    Route::get('/gst-registration', function () {
        return view('services.gst');
    })->name('gst');

    Route::get('/business-incorporation', function () {
        return view('services.business');
    })->name('business');

    Route::get('/salary-tax-calculator', function () {
        return view('services.salary');
    })->name('salary');
});
