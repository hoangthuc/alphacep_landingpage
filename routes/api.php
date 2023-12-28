<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WorkOrderController;
use App\Http\Controllers\WorkOrderTemplateController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\VendorRegisterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ActionOrderController;
use App\Http\Controllers\ProductItemInvoiceController;
use App\Http\Controllers\LineItemInvoiceController;
use App\Http\Controllers\RoadsyncEmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EstimateController;
use App\Http\Controllers\MiscChargeController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\RemitAddressController;
use App\Http\Controllers\AddressController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/sign-up', [AuthController::class, 'register'])->name('register');
Route::post('/sign-in', [AuthController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->group( function () {
    $namespacePrefix = '\\'.config('voyager.controllers.namespace').'\\';
    // Users
    Route::group([
        'as'     => 'user.',
        'prefix' => 'user',
    ], function (){
        $type = 'user';
        Route::post('list', [AuthController::class, 'list'])->name($type.'.list');
        Route::post('create', [AuthController::class, 'create'])->name($type.'.create');
        Route::get('{id}', [AuthController::class, 'detail'])->name($type.'.detail');
        Route::put('update/{id}', [AuthController::class, 'update'])->name($type.'.update');
        Route::delete('{id}', [AuthController::class, 'destroy'])->name($type.'.delete');

    } );

    // Work Order Template
    Route::group([
        'as'     => 'order-template',
        'prefix' => 'order-template',
    ], function () {
        $type = 'order-template';
        Route::post('list', [WorkOrderTemplateController::class, 'index'])->name($type.'.list');
        Route::post('create', [WorkOrderTemplateController::class, 'create'])->name($type.'.create');
        Route::get('{id}', [WorkOrderTemplateController::class, 'show'])->name($type.'.detail');
        Route::put('update/{id}', [WorkOrderTemplateController::class, 'update'])->name($type.'.update');
        Route::delete('{id}', [WorkOrderTemplateController::class, 'destroy'])->name($type.'.delete');
    });

     // Work Order
     Route::group([
        'as'     => 'order',
        'prefix' => 'order',
    ], function () {
        $type = 'order';
        Route::post('list', [WorkOrderController::class, 'index'])->name($type.'.list');
        Route::post('list-diagnose', [WorkOrderController::class, 'indexDiagnose'])->name($type.'.list_diagnose');
        Route::post('create', [WorkOrderController::class, 'create'])->name($type.'.create');
        Route::get('{id}', [WorkOrderController::class, 'show'])->name($type.'.detail');
        Route::put('update/{id}', [WorkOrderController::class, 'update'])->name($type.'.update');
        Route::put('cancel/{id}', [WorkOrderController::class, 'cancel'])->name($type.'.update');
        Route::delete('{id}', [WorkOrderController::class, 'destroy'])->name($type.'.delete');
        Route::post('send/{id}', [WorkOrderController::class, 'sendOrder'])->name($type.'.sendConfirm');
        Route::post('resend/{id}', [WorkOrderController::class, 'sendOrder'])->name($type.'.sendOrder');
    });

    // Work Order
    Route::group([
        'as'     => 'vendor',
        'prefix' => 'vendor',
    ], function () {
        $type = 'vendor';
        Route::post('list', [VendorController::class, 'index'])->name($type.'.list');
        Route::post('create', [VendorController::class, 'create'])->name($type.'.create');
        Route::get('{id}', [VendorController::class, 'show'])->name($type.'.detail');
        Route::put('update/{id}', [VendorController::class, 'update'])->name($type.'.update');
        Route::put('cancel/{id}', [VendorController::class, 'cancel'])->name($type.'.update');
        Route::delete('{id}', [VendorController::class, 'destroy'])->name($type.'.delete');
        Route::post('send/{id}', [VendorController::class, 'sendConfirm'])->name($type.'.sendConfirm');
    });
    
    
    // Parts
    Route::group([
        'as'     => 'part',
        'prefix' => 'part',
    ], function () {
        $type = 'part';
        Route::post('list', [PartController::class, 'index'])->name($type.'.list');
        Route::post('create', [PartController::class, 'create'])->name($type.'.create');
        Route::get('{id}', [PartController::class, 'show'])->name($type.'.detail');
        Route::put('update/{id}', [PartController::class, 'update'])->name($type.'.update');
        Route::delete('{id}', [PartController::class, 'destroy'])->name($type.'.delete');
    });

    // Estimates
    Route::group([
        'as'     => 'estimate',
        'prefix' => 'estimate',
    ], function () {
        $type = 'estimate';
        Route::post('list', [EstimateController::class, 'index'])->name($type.'.list');
        Route::post('create', [EstimateController::class, 'create'])->name($type.'.create');
        Route::get('{id}', [EstimateController::class, 'show'])->name($type.'.detail');
        Route::put('update/{id}', [EstimateController::class, 'update'])->name($type.'.update');
        Route::delete('{id}', [EstimateController::class, 'destroy'])->name($type.'.delete');
    });
    
    // Misc Charge
    Route::group([
        'as'     => 'misc-charge',
        'prefix' => 'misc-charge',
    ], function () {
        $type = 'misc-charge';
        Route::post('list', [MiscChargeController::class, 'index'])->name($type.'.list');
        Route::post('create', [MiscChargeController::class, 'create'])->name($type.'.create');
        Route::get('{id}', [MiscChargeController::class, 'show'])->name($type.'.detail');
        Route::put('update/{id}', [MiscChargeController::class, 'update'])->name($type.'.update');
        Route::delete('{id}', [MiscChargeController::class, 'destroy'])->name($type.'.delete');
    });

    // Address
    Route::group([
        'as'     => 'address',
        'prefix' => 'address',
    ], function () {
        $type = 'address';
        Route::post('list', [AddressController::class, 'index'])->name($type.'.list');
        Route::post('create', [AddressController::class, 'create'])->name($type.'.create');
        Route::get('{id}', [AddressController::class, 'show'])->name($type.'.detail');
    });

    // Remit Address
    Route::group([
        'as'     => 'remit-address',
        'prefix' => 'remit-address',
    ], function () {
        $type = 'remit-address';
        Route::post('list', [RemitAddressController::class, 'index'])->name($type.'.list');
    });
    
    // Country
    Route::group([
        'as'     => 'country-n-state',
        'prefix' => 'country-n-state',
    ], function () {
        $type = 'country-n-state';
        Route::post('list', [CountryController::class, 'index'])->name($type.'.list');
    });


    // Products
    Route::group([
        'as'     => 'product',
        'prefix' => 'product',
    ], function () {
        $type = 'product';
        Route::post('list', [ProductController::class, 'index'])->name($type.'.list');
        Route::post('create', [ProductController::class, 'create'])->name($type.'.create');
        Route::get('{id}', [ProductController::class, 'show'])->name($type.'.detail');
        Route::put('update/{id}', [ProductController::class, 'update'])->name($type.'.update');
        Route::delete('{id}', [ProductController::class, 'destroy'])->name($type.'.delete');
    });

    // Invoice Controller
    Route::group([
        'as'     => 'invoice',
        'prefix' => 'invoice',
    ], function () {
        $type = 'invoice';
        Route::post('list', [InvoiceController::class, 'index'])->name($type.'.list');
        Route::post('create', [InvoiceController::class, 'create'])->name($type.'.create');
        Route::post('create-duplicate/{id}', [InvoiceController::class, 'createDuplicate'])->name($type.'.createDuplicate');
        Route::get('{id}', [InvoiceController::class, 'show'])->name($type.'.detail');
        Route::put('update/{id}', [InvoiceController::class, 'update'])->name($type.'.update');
        Route::delete('{id}', [InvoiceController::class, 'destroy'])->name($type.'.delete');
        Route::post('attachment/{id}', [InvoiceController::class, 'uploadAttachment'])->name($type.'.uploadAttachment');
        Route::post('send/{id}', [InvoiceController::class, 'sendInvoice'])->name($type.'.sendInvoice');
    });
    
    // RoadsyncEmployee
    Route::group([
        'as'     => 'employee',
        'prefix' => 'roadsync-employee',
    ], function () {
        $type = 'employee';
        Route::post('/', [RoadsyncEmployeeController::class, 'store'])->name($type.'.store');
    });
    
    Route::group([
        'as'     => 'customer',
        'prefix' => 'roadsync-customer',
    ], function () {
        $type = 'customer';
        Route::post('/', [CustomerController::class, 'store'])->name($type.'.store');
        Route::post('/list', [CustomerController::class, 'list'])->name($type.'.list');
    });
    
    Route::group([
        'as'     => 'invoice',
        'prefix' => 'roadsync-unit',
    ], function () {
        $type = 'unit';
        Route::post('/', [UnitController::class, 'store'])->name($type.'.store');
        Route::get('/{id}', [UnitController::class, 'item'])->name($type.'.item');
    });
    Route::group([
        'as'     => 'contact',
        'prefix' => 'roadsync-contact',
    ], function () {
        $type = 'contact';
        Route::post('/', [ContactController::class, 'store'])->name($type.'.store');
        Route::get('/{id}', [ContactController::class, 'item'])->name($type.'.item');
    });


    Route::group([
        'as'     => 'product-item',
        'prefix' => 'product-item',
    ], function (){
        $type = 'product-item';
        Route::post('list', [ProductItemInvoiceController::class, 'index'])->name($type.'.list');
        Route::post('create', [ProductItemInvoiceController::class, 'create'])->name($type.'.create');
        Route::get('{id}', [ProductItemInvoiceController::class, 'show'])->name($type.'.detail');
        Route::put('update/{id}', [ProductItemInvoiceController::class, 'update'])->name($type.'.update');
        Route::delete('{id}', [ProductItemInvoiceController::class, 'destroy'])->name($type.'.delete');
    });

    Route::group([
        'as'     => 'line-item',
        'prefix' => 'line-item',
    ], function (){
        $type = 'line-item';
        Route::post('list', [LineItemInvoiceController::class, 'index'])->name($type.'.list');
        Route::post('create', [LineItemInvoiceController::class, 'create'])->name($type.'.create');
        Route::get('{id}', [LineItemInvoiceController::class, 'show'])->name($type.'.detail');
        Route::post('update-status/{id}', [LineItemInvoiceController::class, 'updateStatus'])->name($type.'.update-status');
        Route::put('update/{id}', [LineItemInvoiceController::class, 'update'])->name($type.'.update');
        Route::delete('{id}', [LineItemInvoiceController::class, 'destroy'])->name($type.'.delete');
    });

    // Invoice Controller
    Route::group([
        'as'     => 'payment',
        'prefix' => 'payment',
    ], function () {
        $type = 'payment';
        Route::post('create', [PaymentController::class, 'create'])->name($type.'.create');
    });

    Route::group([
        'as'     => 'vendor-register',
        'prefix' => 'vendor-register',
    ], function (){
        $type = 'vendor-register';
        Route::post('list', [VendorRegisterController::class, 'index'])->name($type.'.list');
        Route::get('{id}', [VendorRegisterController::class, 'show'])->name($type.'.detail');
        Route::put('update/{id}', [VendorRegisterController::class, 'update'])->name($type.'.update');
        Route::delete('{id}', [VendorRegisterController::class, 'destroy'])->name($type.'.delete');
    });

    Route::group([
        'as'     => 'report',
        'prefix' => 'report',
    ], function (){
        $type = 'report';
        Route::post('list', [ReportController::class, 'index'])->name($type.'.list');
        Route::post('create', [ReportController::class, 'create'])->name($type.'.create');
        Route::get('{id}', [ReportController::class, 'show'])->name($type.'.detail');
        Route::put('update/{id}', [ReportController::class, 'update'])->name($type.'.update');
        Route::delete('{id}', [ReportController::class, 'destroy'])->name($type.'.delete');
    });

    

    Route::group([
        'as'     => 'action-order',
        'prefix' => 'action-order',
    ], function (){
        $type = 'action-order';
        Route::post('list', [ActionOrderController::class, 'index'])->name($type.'.list');
        Route::post('create', [ActionOrderController::class, 'create'])->name($type.'.create');
        Route::get('{id}', [ActionOrderController::class, 'show'])->name($type.'.detail');
        Route::put('update/{id}', [ActionOrderController::class, 'update'])->name($type.'.update');
        Route::delete('{id}', [ActionOrderController::class, 'destroy'])->name($type.'.delete');
    });

    Route::group([
        'as'     => 'setting',
        'prefix' => 'setting',
    ], function (){
        $type = 'setting';
        Route::post('list', [SettingController::class, 'index'])->name($type.'.list');
        Route::post('create', [SettingController::class, 'create'])->name($type.'.create');
        Route::get('{key}', [SettingController::class, 'show'])->name($type.'.detail');
        Route::put('update/{id}', [SettingController::class, 'update'])->name($type.'.update');
        Route::delete('{id}', [SettingController::class, 'destroy'])->name($type.'.delete');
    });
    

});

Route::group([
    'as'     => 'location',
    'prefix' => 'location',
], function (){
    $type = 'location';
    Route::post('list', [LocationController::class, 'index'])->name($type.'.list');
    Route::post('create', [LocationController::class, 'create'])->name($type.'.create');
    Route::get('{id}', [LocationController::class, 'show'])->name($type.'.detail');
    Route::put('update/{id}', [LocationController::class, 'update'])->name($type.'.update');
    Route::delete('{id}', [LocationController::class, 'destroy'])->name($type.'.delete');
});
Route::put('order/public/{id}/{public_id}', [WorkOrderController::class, 'updatePublic'])->name('order.updatePublic');
Route::get('order/detail/{id}/{public_id}', [WorkOrderController::class, 'showPublic'])->name('order.detailPublic');
Route::post('sn/{id}/{public_id}', [WorkOrderController::class, 'uploadSignature'])->name('order.uploadSignature');

Route::get('invoice/public/{id}/{public_id}', [InvoiceController::class, 'showPublic'])->name('invoice.updatePublic');

Route::get('vendor/public/{id}/{public_id}', [VendorController::class, 'showPublic'])->name('vendor.detailPublic');
Route::post('vsn/{id}/{public_id}', [VendorController::class, 'uploadSignature'])->name('vendor.uploadSignature');

Route::post('vendor-register/create', [VendorRegisterController::class, 'create'])->name('vendor-register.create');



Route::any('{any}',function(){
    return response()->json(['message' => 'Not Found.'], 404);
})->name('api.fallback.404');