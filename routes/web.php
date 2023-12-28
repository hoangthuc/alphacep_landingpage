<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\WorkOrderController;
use App\Http\Controllers\VendorController;
use App\Models\Invoice;

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
    return view('welcome');
});
Route::get('mail', function () {
        $data = [
            'company'=> "dfgdfgdf",
            'url'=> config('services.company.dashboard')."/auth/invoice/03/dfhdfgdf",
            'textPhone'    => 'Your receipt for tytyyyy is ready. Please follow the link to download your receipt:'.config('services.company.dashboard')."/auth/invoice/03/45654654",
            'textMail'    => 'Your receipt for ttttttis ready. Please follow the link to download your receipt',
            'button' => "View Receipt",
            'transaction' => "#dfgdfg",
        ];
    return view('mailgun-html-invoice', compact('data'));
});
Route::get('pdf/{id}/{public_id}', [PdfController::class, 'index'])->name('index');
Route::get('export-pdf/{id}/{public_id}', [PdfController::class, 'exportPdf']);

Route::get('pdf-vendor/{id}/{public_id}', [PdfController::class, 'showVendor'])->name('showVendor');
Route::get('export-pdf-vendor/{id}/{public_id}', [PdfController::class, 'exportPdfVendor']);
// invoice
Route::get('pdf-invoice/{id}/{public_id}', [PdfController::class, 'showInvoice'])->name('showInvoice');
Route::get('export-pdf-invoice/{id}/{public_id}', [PdfController::class, 'exportPdfInvoice']);

Route::get('rs/{id}/{public_id}', [WorkOrderController::class, 'confirm'])->name('order.confirm');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
