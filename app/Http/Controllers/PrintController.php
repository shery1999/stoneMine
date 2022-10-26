<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProcessedGrading;
use App\Models\Lot;


use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class PrintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lot_id =  request()->route()->parameters['lot_id'];
        $Data = Order::where('lot_id', $lot_id)->with('data', 'showroom')->get();
        
        foreach ($Data as $key => $value) {
            $oneFieldId = Lot::where('id', $Data[$key]['lot_id'])->pluck('storage_id');
            $processed_ids = explode('"', $oneFieldId);
            $data_id = explode(',', $processed_ids[1]);
            $processed_stones_data[] = ProcessedGrading::whereIn('id', $data_id)->get();
        }
        return view('print', compact('Data', 'processed_stones_data'));
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
