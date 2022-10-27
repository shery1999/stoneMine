<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\unprocessed_grading;
use App\Models\mine;
use App\Models\store;
use App\Models\first_storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class unprocessed_gradingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mine_data = mine::get();
        $store_data = store::get();
        return view('unprocessed_grading', compact('mine_data', 'store_data'));
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

        if ($request->file('image')) {

            $photo =  $request->file('image')->store('unprocessed_stone_images', ['disk' => 'public']);
        } else {
            $photo = null;
        }

        $save = unprocessed_grading::create([

            'specimen/bag' => $request->input('specimen/bag'),
            'grade' => $request->input('grade'),
            'weight' => $request->input('weight'),
            'size' => $request->input('size'),
            'qr_code' => $request->input('qr_code'),
            'mine_id' => $request->input('mine'),
            'user_id' => Auth()->user()->id,
            'store_id' => $request->input('store'),
            'picture' => $photo,

        ]);
        $save2 = first_storage::create([
            'store_id' => $request->input('store'),
            'user_id' => Auth()->user()->id,
            'unprocessed_grading_id' => $save['id'],
        ]);

        $id = $save2['id'];
        return redirect('/print_details/' . $id);
        // return redirect('unprocessed_grading');
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