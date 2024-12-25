<?php

use App\Http\Controllers\FormatExcel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');

Route::get('/dashboard',  \App\Livewire\Pages\Dashboard::class)
    ->name('dashboard')
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::view('profile', 'profile')->name('profile');
    Route::get('/reporting', \App\Livewire\Pages\Product\Reporting::class)->name('reporting');
    Route::get('/logs', \App\Livewire\Pages\Product\LogActivity::class)->name('logs');
    Route::get('/log-data', [\App\Livewire\Pages\Product\LogActivity::class, 'getData'])->name('log-data');
    Route::get('/product-catalog', \App\Livewire\Pages\Product\ProductCatalog::class)->name('product-catalog');

    Route::get('/subscription', \App\Livewire\Pages\Subcription\Subcription::class)->name('subscription');
    Route::get('/subscription-data', [\App\Livewire\Pages\Subcription\Subcription::class, 'subscriptionData'])->name('subscription-data');
    // Route::get('/subscription-getInfo/{req_msisdn}/{req_productcode}', [\App\Livewire\Pages\Subcription\GetInfo::class, 'getInfo'])->name('subscription-getInfo');

    Route::get('/create', \App\Livewire\Pages\Product\CreateProduct::class)->name('product.create');

    Route::prefix('log')->group(function () {
        Route::get('/nbp-log', \App\Livewire\Pages\Log\NbpLog::class)->name('log.nbp-log');
        Route::get('/nbp-data', [\App\Livewire\Pages\Log\NbpLog::class, 'getData'])->name('log.nbp-data');
    });

    Route::prefix('reporting')->group(function () {
        Route::get('/portal', \App\Livewire\Pages\Reporting\ReportPortal::class)->name('reporting.report-portal');
        Route::get('/portal-data', [\App\Livewire\Pages\Reporting\ReportPortal::class, 'getReportPortal'])->name('reporting.portal-data');

        Route::get('/digiport', \App\Livewire\Pages\Reporting\ReportDigiport::class)->name('reporting.report-digiport');
        Route::get('/digiport-data', [\App\Livewire\Pages\Reporting\ReportDigiport::class, 'getReportDigiport'])->name('reporting.digiport-data');

        Route::get('/softcancel', \App\Livewire\Pages\Reporting\Reportsoftcancel::class)->name('reporting.report-softcancel');
    });

    Route::prefix('bulk')->group(function () {
        Route::get('/formatSoftCancel', [FormatExcel::class, 'softCancelFormat'])->name('bulk.softCancelFormat');
        Route::get('/formatActivate', [FormatExcel::class, 'activateFormat'])->name('bulk.activateFormat');
    });

    Route::prefix('configuration')->group(function () {
        Route::get('/menu', \App\Livewire\Pages\Configuration\Menu::class)->name('configuration.menu');
    });
});



require __DIR__ . '/auth.php';
