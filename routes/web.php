<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\PlotController as AdminPlotController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\AmenityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvestorGuideController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PlotController as FrontendPlotController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — Public Real Estate Frontend & Admin Portal
|--------------------------------------------------------------------------
*/

// Public Frontend Laravel + Blade Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutController::class, 'index'])->name('about');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/investor-corner', [InvestorGuideController::class, 'index'])->name('investor.corner');
Route::get('/investors-guide', function () {
    return redirect()->route('investor.corner', [], 301);
})->name('investors-guide');
Route::get('/plots', [FrontendPlotController::class, 'index'])->name('plots.index');
Route::post('/plots/unlock-price', [FrontendPlotController::class, 'unlockPrice'])->name('plots.unlock-price');
Route::get('/plots/{plot}', [FrontendPlotController::class, 'show'])->name('plots.show');
Route::get('/amenities', [AmenityController::class, 'index'])->name('amenities');
Route::get('/location', [LocationController::class, 'index'])->name('location');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Public Dynamic API Endpoints
Route::get('/api/plots', [PublicController::class, 'getPlotsApi'])->name('api.plots');
Route::post('/api/enquiries', [PublicController::class, 'submitEnquiry'])->name('api.enquiries');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Projects Portfolio Management
    Route::get('projects', [AdminProjectController::class, 'index'])->name('projects.index');

    // Plot Management
    Route::patch('plots/{plot}/status', [AdminPlotController::class, 'updateStatus'])->name('plots.update-status');
    Route::resource('plots', AdminPlotController::class);

    // Contact Enquiry Management
    Route::get('enquiries', [EnquiryController::class, 'index'])->name('enquiries.index');
    Route::get('enquiries/{enquiry}', [EnquiryController::class, 'show'])->name('enquiries.show');
    Route::put('enquiries/{enquiry}', [EnquiryController::class, 'update'])->name('enquiries.update');
    Route::delete('enquiries/{enquiry}', [EnquiryController::class, 'destroy'])->name('enquiries.destroy');

    // Admin Profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});
