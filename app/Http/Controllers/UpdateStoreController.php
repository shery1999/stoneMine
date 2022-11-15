<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UpdateStoreController extends Controller
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
        $Data = Store::where('id', $id)->first();
        if (!$Data) {
            return redirect()->back()->with(['msgf' => 'Data Not Found']);
        } else {
            return view('update_store', compact('Data'));
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
        //
        // dd($request->all());
        // dd(Rule::unique('mines')->ignore($request->mine));
        $validator = Validator::make($request->all(), [
            'location'     => 'min:4|max:255',
            'description'  => 'max:255',
            'store'        => 'min:4|max:255',
            'store'        => Rule::unique('stores')->ignore($request->id)
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Updated']);
        } else {
            $update = Store::where('id', $id)
                ->update([
                    'store' => $request->store,
                    'location' => $request->location,
                    'description' => $request->description,
                ]);
            return redirect('/add_store')->with(['msg' => 'Record Updated']);
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
