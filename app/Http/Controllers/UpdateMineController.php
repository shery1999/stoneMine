<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mine;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class UpdateMineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id =  request()->route()->parameters['id'];
        $Data = Mine::where('id', $id)->first();
        if (!$Data) {
            return redirect()->back()->with(['msgf' => 'Data Not Found']);
        } else {
            return view('update_mine', compact('Data'));
        }
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
        $validator = Validator::make($request->all(), [
            'location'    => 'min:4|max:255',
            'description' => 'max:255',
            'mine'        => 'max:255',
            'mine'        =>  Rule::unique('mines')->ignore($request->id)
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Updated']);
        } else {
            $update = Mine::where('id', $id)
                ->update([
                    'mine' => $request->mine,
                    'location' => $request->location,
                    'description' => $request->description,
                ]);
            return redirect('/add_mine')->with(['msg' => 'Record Updated']);
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
