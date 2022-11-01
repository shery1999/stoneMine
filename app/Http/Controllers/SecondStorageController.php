<?php

namespace App\Http\Controllers;

use App\Models\SecondStorage;
use App\Models\Store;
use App\Models\ProcessedGrading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SecondStorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processedSpecimen = SecondStorage::where('status', '0')->with('data', 'stores')->get();
        return view('list_second_storage', compact('processedSpecimen'));
    }

    public function index1()
    {
        $store_data = Store::get();
        $stone_data = SecondStorage::get();
        return view('to_store_processed', compact('store_data', 'stone_data'));
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
        //    dd($request->all());
        // $save = SecondStorage::create([
        //     'store_id' => $request->input('store'),
        //     'processed_grading_id' => $request->input('processeed_specimen'),
        //     'user_id' => $request->input('user_id'),
        //     'description' => $request->input('description'),
        // ]);

        // return redirect('to_store_processed');
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
        $validator = Validator::make($request->all(), [
            'store' =>               'required|max:255',
            'processeed_specimen' => 'required|max:255',
            'description' =>         'max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $save = SecondStorage::where('processed_grading_id', $request->input('processeed_specimen'))
                ->update([
                    'store_id' => $request->input('store'),
                    'processed_grading_id' => $request->input('processeed_specimen'),
                    'user_id' => $request->input('user_id'),
                    'description' => $request->input('description'),
                ]);
            return redirect()->back()->with(['msg' => 'data submitted']);
            // return redirect('to_store_processed');
        }
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
