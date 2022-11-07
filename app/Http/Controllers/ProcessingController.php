<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Processing;
use App\Models\Workshop;
use App\Models\FirstStorage;
use App\Models\MultipleProcessingIds;
use Illuminate\Support\Facades\Validator;

use App\Models\UnprocessedGrading;



class ProcessingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workshop_data = Workshop::where('status', 1)->get();
        $first_storage_data = FirstStorage::where('status', 0)->get();
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
        $validator = Validator::make($request->all(), [
            'workshop' => 'max:255',
            'bag_ids' => 'required|max:255',
            'description' => 'max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with(['msgf' => "Data not inserted"]);
        } else {
            $save_multiple = MultipleProcessingIds::create([
                'processing_ids' => $request->input('bag_ids'),
                'description' => $request->input('description'),
            ]);
            $result1 = explode(',', $request->input('bag_ids'));
            foreach ($result1 as $key => $value) {
                $result  = explode('|', $value);
                $save = Processing::create([
                    'workshop_id' => $request->input('workshop'),
                    'first_storage_id' => $result[1],
                    'unprocessed_grading_id' => $result[0],
                    'user_id' =>  Auth()->user()->id,
                    'description' => $request->input('description'),
                ]);
                $unprocessed_id =  $save['first_storage_id'];
                $updateStaus = FirstStorage::where('id', $unprocessed_id)
                    ->update(
                        ['status' => 1]
                    );
            }
            $id = $save_multiple['id'];
            return redirect()->back()->with(['msg' => '/print_processing_details/' . $id,]);
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
