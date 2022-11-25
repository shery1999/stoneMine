<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\MineController;
use App\Http\Controllers\ShowroomController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UnprocessedGradingController;
use App\Http\Controllers\FirstStorageController;
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
use App\Http\Controllers\UpdateMineController;
use App\Http\Controllers\UpdateShowroomController;
use App\Http\Controllers\UpdateStoreController;
use App\Http\Controllers\UpdateUserController;
use App\Http\Controllers\UpdateWorkshopController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('login', function () {
    return view('login');
});
Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false,
]);


Route::group(['middleware' => ['auth']], function () {

    // unprocessed_grading
    Route::get('unprocessed_grading', function () {
        return view('unprocessed_grading');
    });
    Route::post('/unprocessed_grading', [UnprocessedGradingController::class, 'store']);
    Route::get('unprocessed_grading',  [UnprocessedGradingController::class, 'index']);
    Route::get('print_details/{id}', function () {
        return view('print_details/{id}');
    });
    Route::get('print_details/{id}', [PrintUnprocessedDetailController::class, 'index']);

    Route::get('processing', function () {
        return view('processing');
    });
    Route::post('/processing', [ProcessingController::class, 'store']);
    Route::get('/processing',  [ProcessingController::class, 'index']);
    Route::get('print_processing_details/{id}', function () {
        return view('print_processing_details/{id}');
    });
    Route::get('print_processing_details/{id}', [PrintProcessingDetailController::class, 'index']);

    // processed_specimen
    Route::get('processed_specimen', function () {
        return view('processed_specimen');
    });
    Route::post('/processed_specimen', [ProcessedGradingController::class, 'store']);
    Route::get('/processed_specimen',  [ProcessedGradingController::class, 'index']);
    Route::get('print_processed/{id}', function () {
        return view('print_processed/{id}');
    });
    Route::get('print_processed/{id}', [PrintProcessedDetailController::class, 'index']);
});









Route::group(['middleware' => ['auth', 'roleAuth']], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('admin_panel', function () {
        return view('admin_panel');
    });
    Route::get('admin_panel',  [HomeController::class, 'index']);

    Route::get('test', function () {
        return view('test');
    });
    // Route::get('test', [ChartJSController::class, 'index']);

    // showroom
    Route::get('add_showroom', function () {
        return view('add_showroom');
    });
    Route::post('/add_showroom', [ShowroomController::class, 'store']);
    Route::get('/add_showroom', [ShowroomController::class, 'index2']);
    Route::post('/showroom_status_update', [ShowroomController::class, 'ShowroomUpdateStatus'])->name('showroomstatusUpdate.post');

    // add user
    Route::get('add_user', function () {
        return view('add_user');
    });
    Route::get('/add_user', [UserController::class, 'index']);
    Route::post('/add_user', [UserController::class, 'store']);
    Route::post('/status_update', [UserController::class, 'updateStatus'])->name('statusUpdate.post');

    // add mine
    Route::get('add_mine', function () {
        return view('add_mine');
    });
    Route::post('/add_mine', [MineController::class, 'store']);
    Route::get('/add_mine', [MineController::class, 'index']);
    Route::post('/mine_status_update', [MineController::class, 'MineUpdateStatus'])->name('minestatusUpdate.post');

    // Route::get('update_showroom', function () {
    // return view('update_showroom');
    // });
    Route::get('/update_mine/{id}', [UpdateMineController::class, 'index']);
    Route::put('/update_mine/{id}', [UpdateMineController::class, 'update']);

    Route::get('/update_showroom/{id}', [UpdateShowroomController::class, 'index']);
    Route::put('/update_showroom/{id}', [UpdateShowroomController::class, 'update']);

    Route::get('/update_store/{id}', [UpdateStoreController::class, 'index']);
    Route::put('/update_store/{id}', [UpdateStoreController::class, 'update']);

    Route::get('/update_workshop/{id}', [UpdateWorkshopController::class, 'index']);
    Route::put('/update_workshop/{id}', [UpdateWorkshopController::class, 'update']);

    Route::get('/update_user/{id}', [UpdateUserController::class, 'index']);
    Route::put('/update_user/{id}', [UpdateUserController::class, 'update']);

    // add store
    Route::get('add_store', function () {
        return view('add_store');
    });
    Route::post('/add_store', [StoreController::class, 'store']);
    Route::get('/add_store', [StoreController::class, 'index']);
    Route::post('/store_status_update', [StoreController::class, 'StoreUpdateStatus'])->name('storestatusUpdate.post');

    // add worshop
    Route::get('add_workshop', function () {
        return view('add_workshop');
    });
    Route::post('/add_workshop', [WorkshopController::class, 'store']);
    Route::get('/add_workshop', [WorkshopController::class, 'index']);
    Route::post('/workshop_status_update', [WorkshopController::class, 'WorkshopUpdateStatus'])->name('workshopstatusUpdate.post');


    Route::get('to_store', function () {
        return view('to_store');
    });
    Route::post('/to_store', [FirstStorageController::class, 'update']);
    Route::get('to_store',  [FirstStorageController::class, 'index1']);

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

    Route::get('list_unprocessed', [FirstStorageController::class, 'index']);

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
    Route::get('view_showroom_detail', [ShowroomController::class, 'index']);


    Route::get('view_sold_lot', function () {
        return view('view_sold_lot');
    });

    Route::get('orders', function () {
        return view('orders');
    });
    Route::get('/orders', [OrderController::class, 'index']);


    Route::get('print/{lot_id}', function () {
        return view('print/{lot_id}');
    });

    Route::get('/print/{lot_id}', [PrintController::class, 'index']);

    Route::get('print_processing_details', function () {
        return view('print_processing_details');
    });
    // Route::get('print_processing_details/{id}', function () {
    //     return view('print_processing_details/{id}');
    // });
    // Route::get('print_processing_details/{id}', [PrintProcessingDetailController::class, 'index']);
});
