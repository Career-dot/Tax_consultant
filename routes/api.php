<?php

use App\Http\Controllers\PlannerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TaxUpdateController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // Planner API (public for anonymous users)
    Route::post('/planner/deadlines', [PlannerController::class, 'getDeadlines'])->name('api.planner.deadlines');
    Route::post('/planner/subscribe', [PlannerController::class, 'subscribe'])->name('api.planner.subscribe');

    // Contact Form API (public, rate-limited)
    Route::post('/contact', [ContactController::class, 'store'])
        ->name('api.contact.store')
        ->middleware('throttle:10,1');

    // Public read-only endpoints
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('api.testimonials.index');
    Route::get('/tax-updates', [TaxUpdateController::class, 'index'])->name('api.tax-updates.index');
    Route::get('/tax-updates/{slug}', [TaxUpdateController::class, 'show'])->name('api.tax-updates.show');

    // Authenticated endpoints
    Route::middleware('auth:web')->group(function () {
        Route::get('/planner/my-deadlines', [PlannerController::class, 'myDeadlines'])->name('api.planner.my-deadlines');
        Route::get('/planner/export/ics', [PlannerController::class, 'exportIcs'])->name('api.planner.export.ics');
        Route::get('/planner/export/pdf', [PlannerController::class, 'exportPdf'])->name('api.planner.export.pdf');
    });
});
