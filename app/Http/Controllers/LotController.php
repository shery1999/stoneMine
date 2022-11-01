<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Second_storage;
use App\Models\ProcessedGrading;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $processedSpecimen = second_storage::where('status', '0')->with('data', 'stores')->get();
        // dd($processedSpecimen);
        return view('create_lot', compact('processedSpecimen'));
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

        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'storage_id' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {


            $save_lot = Lot::create([
                'storage_id' => $request->input('storage_id'),
                'price' => $request->input('price'),
            ]);
            $lot = $request->input('storage_id');
            $processed_ids = explode(",", $lot);

            foreach ($processed_ids as $i => $key) {
                $updateStatus = Second_storage::where('processed_grading_id', $processed_ids[$i])
                    ->update(
                        ['status' => 1]
                    );
            }
            $lot_id_data = $save_lot['id'];
            // return redirect()->back()->with(['msg' => '/select_lot/' . $lot_id_data]);
            return redirect('/select_lot/' . $lot_id_data)->with(['msg' => "Lot Created Successfully.Please Select Showroom and Submit."]);
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
