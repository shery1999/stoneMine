<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\first_storage;
use App\Models\processing;
use App\Models\Second_storage;
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
        $first_storage_total = first_storage::count();
        $first_storage = first_storage::where('status', 0)->count();

        $processing_total = processing::count();
        $processing = processing::where('status', 0)->count();

        $second_storage_total = Second_storage::count();
        $second_storage = Second_storage::where('status', 0)->count();

        $order = Order::count();

        // $first_storage_data =  first_storage::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
        //     ->groupBy('date')
        //     ->get();
        // foreach ($first_storage_data as $key => $item) {

        //     $first_storage_labels[] =  $item['date'];
        //     $first_storage_data_v[] = $item['views'];
        // }
        // // dd($first_storage_data_v);
        // $second_storage_data =  Second_storage::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
        //     ->groupBy('date')
        //     ->get();
        // foreach ($second_storage_data as $key => $item) {

        //     $second_storage_labels[] =  $item['date'];
        //     $second_storage_data_v[] = $item['views'];
        // }

        // $processing_data =  processing::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
        //     ->groupBy('date')
        //     ->get();
        // foreach ($processing_data as $key => $item) {

        //     $processing_labels[] =  $item['date'];
        //     $processing_data_v[] = $item['views'];
        // }





        $users1 = first_storage::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count', 'month_name');

        $labels1 = $users1->keys();
        $data1 = $users1->values();
        $users2 = Second_storage::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count', 'month_name');

        $labels2 = $users2->keys();
        $data2 = $users2->values();
        $users3 = processing::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count', 'month_name');

        $labels3 = $users3->keys();
        $data3 = $users3->values();

        return view('admin_panel', compact('labels1', 'data1', 'labels2', 'data2', 'labels3', 'data3', 'first_storage_total', 'first_storage', 'processing_total', 'processing', 'second_storage_total', 'second_storage', 'order'));
    }
}
