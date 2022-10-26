<?php

namespace App\Http\Controllers;

use App\Models\storeController;
use Illuminate\Http\Request;
use App\Models\store;


class StoreControllerController extends Controller
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
        $save = store::create([

            'store' => $request->input('store'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),

        ]);
        return redirect('add_store');
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
