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

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::prefix('services')->name('services.')->group(function () {
    Route::get('/personal-tax-filing', function () {
        return view('services.personal');
    })->name('personal');

    Route::get('/family-tax-filing', function () {
        return view('services.family');
    })->name('family');

    Route::get('/business-tax-return', function () {
        return view('services.business-tax');
    })->name('business-tax');

    Route::get('/ntn-registration', function () {
        return view('services.ntn');
    })->name('ntn');

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
