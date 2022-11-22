<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProcessedGrading;
use App\Models\Lot;
use App\Models\SecondStorage;
use App\Models\Showroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data = Order::with('data', 'showroom')->get();
        $processed_stones_data = [];
        foreach ($Data as $key => $value) {
            $oneFieldId = Lot::where('id', $Data[$key]['lot_id'])->pluck('storage_id');
            $processed_ids = explode('"', $oneFieldId);
            $data_id = explode(',', $processed_ids[1]);
            $processed_stones_data[] = ProcessedGrading::whereIn('id', $data_id)->get();
        }
        return view('orders', compact('Data', 'processed_stones_data'));
    }
    public function index1()
    {
        $showroom_data = Showroom::where('status', 1)->get();
        return view('select_lot', compact('showroom_data'));
    }

    public function index2()
    {
        $processedSpecimen = SecondStorage::with('data', 'stores')->get();
        return view('select_lot', compact('processedSpecimen'));
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
        $validator = Validator::make($request->all(), [
            'lot_id_data' => 'required|max:255',
            'showroom' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with(['msg' => "Showroom not Selected. Please select Showroom and Submit"])->with(['msgf' => "Data not inserted"]);
        } else {
            $save = Order::create([
                'lot_id' => $request->input('lot_id_data'),
                'showroom_id' => $request->input('showroom'),
            ]);
            $lot_id = $request->input('lot_id_data');

            $lot_details = Lot::where('id', $lot_id)->get();
            $lot = $lot_details[0]['storage_id'];



            // $lot = ;
            $processed_ids = explode(",", $lot);

            foreach ($processed_ids as $i => $key) {
                $updateStatus = SecondStorage::where('processed_grading_id', $processed_ids[$i])
                    ->update(
                        ['status' => 1]
                    );
            }


            $lot_id = $save['lot_id'];
            return redirect('create_lot')->with(['msg' => '/print/' . $lot_id]);
        }
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
    public function update(Request $request)
    {
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
