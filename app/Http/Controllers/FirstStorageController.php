<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FirstStorage;
use App\Models\Store;
use App\Models\UnprocessedGrading;
use Illuminate\Support\Facades\Validator;


class FirstStorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //FOR GETTING DATA FROM DB

        $firstGrading = FirstStorage::where('status', '0')->with('stores', 'unprocessed_grading_data.mines')->get();
        // dd($firstGrading);
        return view('list_first_grading', compact('firstGrading'));
    }

    public function index1()
    {
        $store_data = Store::get();
        $stone_data = FirstStorage::get();
        return view('to_store', compact('store_data', 'stone_data'));
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
        // $save = FirstStorage::create([
        //     'store_id' => $request->input('store'),
        //     'unprocessed_grading_id' => $request->input('bag_id'),
        //     'user_id' => $request->input('user_id'),
        //     'description' => $request->input('description'),
        // ]);
        // return redirect('to_store');
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
            'store' =>         'required|max:255',
            'bag_id' =>        'required|max:255',
            'description' =>   'max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $save = FirstStorage::where('unprocessed_grading_id', $request->input('bag_id'))
                ->update([
                    'store_id' => $request->input('store'),
                    'unprocessed_grading_id' => $request->input('bag_id'),
                    'user_id' => Auth()->user()->id,
                    'description' => $request->input('description'),
                ]);
            return redirect()->back()->with(['msg' => 'data submitted']);
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
    }
}
