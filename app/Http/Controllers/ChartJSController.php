<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\first_storage;
use App\Models\Second_storage;
use App\Models\processing;
use Illuminate\Support\Facades\DB;

class ChartJSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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


        $first_storage_data =  first_storage::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
            ->groupBy('date')
            ->get();
        foreach ($first_storage_data as $key => $item) {

            $first_storage_labels[] =  $item['date'];
            $first_storage_data_v[] = $item['views'];
        }
        // dd($first_storage_data_v);
        $second_storage_data =  Second_storage::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
            ->groupBy('date')
            ->get();
        foreach ($second_storage_data as $key => $item) {

            $second_storage_labels[] =  $item['date'];
            $second_storage_data_v[] = $item['views'];
        }

        $processing_data =  processing::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
            ->groupBy('date')
            ->get();
        foreach ($processing_data as $key => $item) {

            $processing_labels[] =  $item['date'];
            $processing_data_v[] = $item['views'];
        }




        return view('test', compact('labels1', 'data1', 'labels2', 'data2', 'labels3', 'data3', 'first_storage_labels', 'first_storage_data_v', 'second_storage_labels', 'second_storage_data_v', 'processing_labels', 'processing_data_v'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
