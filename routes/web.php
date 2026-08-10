<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\ApplicationController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DocumentController;
use App\Http\Controllers\Dashboard\InvoiceController;
use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\Dashboard\PaymentController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\SupportController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TaxUpdateController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NotificationController as AdminNotificationController;
use App\Http\Controllers\Admin\DeadlineRuleController;
use App\Http\Controllers\Admin\ReminderConfigController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\UserDocumentController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\BroadcastController;
use App\Http\Controllers\PlannerController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/industries', function () {
    return view('industries');
})->name('industries');

Route::get('/resources', function () {
    return view('resources');
})->name('resources');

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

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.post');
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'reset'])->name('password.update');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.post');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications');
    Route::get('/applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');

    Route::get('/filing/{service}', [ApplicationController::class, 'create'])->name('filing.create');
    Route::post('/filing/{service}', [ApplicationController::class, 'store'])->name('filing.store');

    Route::get('/documents', [DocumentController::class, 'index'])->name('documents');
    Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');
    Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');

    Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
    Route::post('/payments/pay', [PaymentController::class, 'pay'])->name('payments.pay');

    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices');
    Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');

    Route::get('/support', [SupportController::class, 'index'])->name('support');
    Route::post('/support', [SupportController::class, 'store'])->name('support.store');
    Route::get('/support/{ticket}', [SupportController::class, 'show'])->name('support.show');
    Route::post('/support/{ticket}/reply', [SupportController::class, 'reply'])->name('support.reply');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::post('/notifications/{notification}/read', [NotificationController::class, 'markRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllRead'])->name('notifications.readAll');

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::put('/settings/notifications', [SettingsController::class, 'updateNotificationPreferences'])->name('settings.notifications');
});

Route::get('/planner', [PlannerController::class, 'index'])->name('planner.index');
Route::get('/planner/export/ics', [PlannerController::class, 'exportIcs'])->name('planner.export.ics');
Route::get('/planner/export/pdf', [PlannerController::class, 'exportPdf'])->name('planner.export.pdf');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::post('users/{user}/services/{service}/status', [AdminUserController::class, 'updateServiceStatus'])->name('users.services.status');
    Route::resource('users', AdminUserController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('tax-updates', TaxUpdateController::class);
    Route::resource('deadline-rules', DeadlineRuleController::class);

    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');

    Route::get('notifications', [AdminNotificationController::class, 'index'])->name('notifications.index');

    Route::get('reminder-config', [ReminderConfigController::class, 'index'])->name('reminder-config');
    Route::put('reminder-config', [ReminderConfigController::class, 'update'])->name('reminder-config.update');

    Route::get('subscribers', [SubscriberController::class, 'index'])->name('subscribers.index');

    Route::get('user-documents', [UserDocumentController::class, 'index'])->name('user-documents.index');
    Route::get('user-documents/{user}', [UserDocumentController::class, 'show'])->name('user-documents.show');
    Route::get('user-documents/{document}/preview', [UserDocumentController::class, 'preview'])->name('user-documents.preview');
    Route::get('user-documents/{document}/download', [UserDocumentController::class, 'download'])->name('user-documents.download');
    Route::post('user-documents/{document}/approve', [UserDocumentController::class, 'approve'])->name('user-documents.approve');
    Route::post('user-documents/{document}/reject', [UserDocumentController::class, 'reject'])->name('user-documents.reject');
    Route::post('user-documents/{user}/request', [UserDocumentController::class, 'request'])->name('user-documents.request');

    Route::get('payments', [AdminPaymentController::class, 'index'])->name('payments.index');
    Route::post('payments/{payment}/approve', [AdminPaymentController::class, 'approve'])->name('payments.approve');
    Route::post('payments/{payment}/reject', [AdminPaymentController::class, 'reject'])->name('payments.reject');

    Route::post('broadcast', [BroadcastController::class, 'store'])->name('broadcast');
});
