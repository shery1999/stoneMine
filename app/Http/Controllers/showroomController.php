<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\showroom;
use Illuminate\Support\Facades\Validator;


class showroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $showroom_data = showroom::get();
        // dd($showroom_data);
        return view('view_showroom_detail', compact('showroom_data'));
    }
    public function index2()
    {
        $ShowroomData = showroom::get();
        dd($ShowroomData);
        return view('add_showroom', compact('ShowroomData'));
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
            // dd($request->all()),
            'ownername' => 'required|max:255',
            'showroomname' => 'required|unique:showrooms|max:255',
            'adress' => 'required|max:255',
            'city' => 'required|max:255',
            'country' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {

            $save = showroom::create([
                'ownername' => $request->input('ownername'),
                'showroomname' => $request->input('showroomname'),
                'phone1' => $request->input('phone1'),
                'phone2' => $request->input('phone2'),
                'phone3' => $request->input('phone3'),
                'adress' => $request->input('adress'),
                'city' => $request->input('city'),
                'country' => $request->input('country'),
            ]);
            // dd($save);
            return redirect()->back()->with(['msg' => 'data submitted']);

            return redirect('add_showroom');
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
