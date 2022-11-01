<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProcessedGrading;
use App\Models\Lot;
use App\Models\Second_storage;
use App\Models\showroom;
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
        // dd($Data);

        foreach ($Data as $key => $value) {
            $oneFieldId = Lot::where('id', $Data[$key]['lot_id'])->pluck('storage_id');
            $processed_ids = explode('"', $oneFieldId);
            $data_id = explode(',', $processed_ids[1]);
            $processed_stones_data[] = ProcessedGrading::whereIn('id', $data_id)->get();
        }
        // dd($processed_stones_data);

        return view('orders', compact('Data', 'processed_stones_data'));
    }
    public function index1()
    {
        $showroom_data = showroom::get();
        return view('select_lot', compact('showroom_data'));
    }

    public function index2()
    {
        $processedSpecimen = Second_storage::with('data', 'stores')->get();
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
            return redirect()->back()->with(['msg' => "1"]);
            // return redirect()->back()->with(['msg' => "Showroom not Selected. Please select Showroom and Submit"]);
        } else {
            $save = Order::create([
                'lot_id' => $request->input('lot_id_data'),
                'showroom_id' => $request->input('showroom'),
            ]);
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
