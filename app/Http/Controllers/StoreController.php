<?php

namespace App\Http\Controllers;

// use App\Models\StoreController;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Validator;



class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'store' => 'required|unique:stores|max:255',
            'location' => 'required|max:255',
            'description' => 'max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Submitted']);
        } else {
            $save = Store::create([

                'store' => $request->input('store'),
                'location' => $request->input('location'),
                'description' => $request->input('description'),

            ]);
            return redirect()->back()->with(['msg' => 'data submitted']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\storeController  $storeController
     * @return \Illuminate\Http\Response
     */
    public function show(storeController $storeController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\storeController  $storeController
     * @return \Illuminate\Http\Response
     */
    public function edit(storeController $storeController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\storeController  $storeController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, storeController $storeController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\storeController  $storeController
     * @return \Illuminate\Http\Response
     */
    public function destroy(storeController $storeController)
    {
        //
    }
}
