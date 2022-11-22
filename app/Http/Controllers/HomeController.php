<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FirstStorage;
use App\Models\Processing;
use App\Models\SecondStorage;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $first_storage_total = FirstStorage::count();
        $first_storage = FirstStorage::where('status', 0)->count();

        $processing_total = Processing::count();
        $processing = Processing::where('status', 0)->count();

        $second_storage_total = SecondStorage::count();
        $second_storage = SecondStorage::where('status', 0)->count();

        $order = Order::count();

        // per day result
        // $first_storage_data =  FirstStorage::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
        //     ->groupBy('date')
        //     ->get();
        // foreach ($first_storage_data as $key => $item) {

        //     $first_storage_labels[] =  $item['date'];
        //     $first_storage_data_v[] = $item['views'];
        // }
        // // dd($first_storage_data_v);
        // $second_storage_data =  SecondStorage::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
        //     ->groupBy('date')
        //     ->get();
        // foreach ($second_storage_data as $key => $item) {

        //     $second_storage_labels[] =  $item['date'];
        //     $second_storage_data_v[] = $item['views'];
        // }

        // $processing_data =  Processing::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
        //     ->groupBy('date')
        //     ->get();
        // foreach ($processing_data as $key => $item) {

        //     $processing_labels[] =  $item['date'];
        //     $processing_data_v[] = $item['views'];
        // }




        $users1 = FirstStorage::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count', 'month_name');

        $labels1 = $users1->keys();
        $data1 = $users1->values();
        $users2 = SecondStorage::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count', 'month_name');

        $labels2 = $users2->keys();
        $data2 = $users2->values();
        $users3 = Processing::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count', 'month_name');

        $labels3 = $users3->keys();
        $data3 = $users3->values();

        return view('admin_panel', compact('labels1', 'data1', 'labels2', 'data2', 'labels3', 'data3', 'first_storage_total', 'first_storage', 'processing_total', 'processing', 'second_storage_total', 'second_storage', 'order'));
    }
}
