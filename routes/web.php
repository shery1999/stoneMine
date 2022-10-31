<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\mineController;
use App\Http\Controllers\showroomController;
use App\Http\Controllers\workshopController;
use App\Http\Controllers\StoreControllerController;
use App\Http\Controllers\unprocessed_gradingController;
use App\Http\Controllers\first_storageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProcessingController;
use App\Http\Controllers\ProcessedGradingController;
use App\Http\Controllers\SecondStorageController;
use App\Http\Controllers\LotController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\PrintUnprocessedDetailController;
use App\Http\Controllers\PrintProcessedDetailController;
use App\Http\Controllers\PrintProcessingDetailController;
use App\Http\Controllers\ChartJSController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('login', function () {
    return view('login');
});
Auth::routes([
    'register' => false,
]);


Route::group(['middleware' => ['auth']], function () {

    // unprocessed_grading
    Route::get('unprocessed_grading', function () {
        return view('unprocessed_grading');
    });
    Route::post('/unprocessed_grading', [unprocessed_gradingController::class, 'store']);
    Route::get('unprocessed_grading',  [unprocessed_gradingController::class, 'index']);



    Route::get('processing', function () {
        return view('processing');
    });
    Route::post('/processing', [ProcessingController::class, 'store']);
    Route::get('/processing',  [ProcessingController::class, 'index']);

    // processed_specimen
    Route::get('processed_specimen', function () {
        return view('processed_specimen');
    });
    Route::post('/processed_specimen', [ProcessedGradingController::class, 'store']);
    Route::get('/processed_specimen',  [ProcessedGradingController::class, 'index']);

    Route::get('to_store', function () {
        return view('to_store');
    });
    Route::post('/to_store', [first_storageController::class, 'update']);
    Route::get('to_store',  [first_storageController::class, 'index1']);

    Route::get('to_store_processed', function () {
        return view('to_store_processed');
    });
    Route::post('/to_store_processed', [SecondStorageController::class, 'update']);
    Route::get('to_store_processed',  [SecondStorageController::class, 'index1']);


    // create lot page
    Route::get('create_lot', function () {
        return view('create_lot');
    });
    Route::post('create_lot', [LotController::class, 'store']);
    Route::get('create_lot',  [LotController::class, 'index']);



    Route::get('sale', function () {
        return view('sale');
    });
    Route::get('bill', function () {
        return view('bill');
    });
    Route::get('list_unprocessed', [first_storageController::class, 'index']);

    Route::get('list_processed', function () {
        return view('list_second_storage');
    });
    Route::get('list_processed', [SecondStorageController::class, 'index']);

    Route::get('/select_lot/{slug_id}', function () {
        return view('select_lot/{slug_id}');
    });
    Route::get('select_lot/{slug_id}', [OrderController::class, 'index1']);
    Route::post('select_lot', [OrderController::class, 'store']);

    // Route::get('select_lot', [OrderController::class, 'store']);


    Route::get('view_lot_detail', function () {
        return view('view_lot_detail');
    });


    Route::get('view_showroom_detail', function () {
        return view('view_showroom_detail');
    });
    Route::get('view_showroom_detail', [showroomController::class, 'index']);


    Route::get('create_bill', function () {
        return view('create_bill');
    });

    Route::get('view_sold_lot', function () {
        return view('view_sold_lot');
    });

    Route::get('orders', function () {
        return view('orders');
    });
    Route::get('/orders', [OrderController::class, 'index']);


    Route::get('/qrcode', function () {
        return view('qrcode');
    });

    Route::get('print/{lot_id}', function () {
        return view('print/{lot_id}');
    });

    Route::get('/print/{lot_id}', [PrintController::class, 'index']);

    Route::get('print_details/{id}', function () {
        return view('print_details/{id}');
    });
    Route::get('print_details/{id}', [PrintUnprocessedDetailController::class, 'index']);


    Route::get('print_processed', function () {
        return view('print_processed');
    });
    Route::get('print_processed/{id}', function () {
        return view('print_processed/{id}');
    });
    Route::get('print_processed/{id}', [PrintProcessedDetailController::class, 'index']);

    Route::get('print_processing_details', function () {
        return view('print_processing_details');
    });
    Route::get('print_processing_details/{id}', function () {
        return view('print_processing_details/{id}');
    });
    Route::get('print_processing_details/{id}', [PrintProcessingDetailController::class, 'index']);


});

Route::group(['middleware' => ['auth','roleAuth']], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('admin_panel', function () {
        return view('admin_panel');
    });
    Route::get('admin_panel',  [HomeController::class, 'index']);

    Route::get('test', function () {
        return view('test');
    });
    Route::get('test', [ChartJSController::class, 'index']);

    // showroom
    Route::get('add_showroom', function () {
        return view('add_showroom');
    });
    Route::post('/add_showroom', [showroomController::class, 'store']);

    // add user
    Route::get('add_user', function () {
        return view('add_user');
    });

    Route::post('/add_user', [UserController::class, 'store']);

    // add mine
    Route::get('add_mine', function () {
        return view('add_mine');
    });
    Route::post('/add_mine', [mineController::class, 'store']);

    // add store
    Route::get('add_store', function () {
        return view('add_store');
    });
    Route::post('/add_store', [StoreControllerController::class, 'store']);

    // add worshop
    Route::get('add_workshop', function () {
        return view('add_workshop');
    });
    Route::post('/add_workshop', [workshopController::class, 'store']);

});