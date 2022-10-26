<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\processing;
use App\Models\workshop;
use App\Models\first_storage;
use App\Models\MultipleProcessingIds;
use App\Models\unprocessed_grading;



class ProcessingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workshop_data = workshop::get();
        $first_storage_data = first_storage::where('status', 0)->get();
        return view('processing', compact('workshop_data', 'first_storage_data'));
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
        $save_multiple = MultipleProcessingIds::create([
            'processing_ids' => $request->input('bag_ids'),
            'description' => $request->input('description'),
        ]);

        $result1 = explode(',', $request->input('bag_ids'));
        foreach ($result1 as $key => $value) {

            $result  = explode('|', $value);
            // dd($result);

            $save = processing::create([
                'workshop_id' => $request->input('workshop'),
                'first_storage_id' => $result[1],
                'unprocessed_grading_id' => $result[0],
                'user_id' =>  Auth()->user()->id,
                'description' => $request->input('description'),
            ]);
            $unprocessed_id =  $save['first_storage_id'];
            $updateStaus = first_storage::where('id', $unprocessed_id)
                ->update(
                    ['status' => 1]
                );
        }
        $id = $save_multiple['id'];
        // dd($id);

        return redirect('/print_processing_details/' . $id);
        // return redirect('/select_lot/' . $lot_id_data);

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
