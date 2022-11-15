<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Showroom;
use Illuminate\Support\Facades\Validator;


class ShowroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $showroom_data = Showroom::where('status', 1)->get();
        return view('view_showroom_detail', compact('showroom_data'));
    }
    public function index2()
    {
        $showroom_data = Showroom::get();
        return view('add_showroom', compact('showroom_data'));
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
            'ownername' => 'required|max:255',
            'showroomname' => 'required|unique:showrooms|max:255',
            'email' => 'unique:showrooms|max:255',
            'adress' => 'required|max:255',
            'city' => 'required|max:255',
            'country' => 'required|max:255',

        ]);
        if (!$request->phone1 == '') {
            $validator = Validator::make($request->all(), [
                'phone1' => 'max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            ]);
        }
        if (!$request->phone2 == '') {
            $validator = Validator::make($request->all(), [
                'phone2' => 'max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            ]);
        }
        if (!$request->phone3 == '') {
            $validator = Validator::make($request->all(), [
                'phone3' => 'max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            ]);
        }
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Submitted']);
        } else {

            $save = Showroom::create([
                'ownername' => $request->input('ownername'),
                'showroomname' => $request->input('showroomname'),
                'email' => $request->input('email'),
                'adress' => $request->input('adress'),
                'city' => $request->input('city'),
                'country' => $request->input('country'),
                'phone1' => $request->input('phone1'),
                'phone2' => $request->input('phone2'),
                'phone3' => $request->input('phone3'),
            ]);
            return redirect()->back()->with(['msg' => 'Data submitted']);
        }
    }

    public function  ShowroomUpdateStatus(Request $request)
    {
        $updateUser = Showroom::where('id', $request->id)->update([
            'status' => $request->status
        ]);
        if ($updateUser) {
            return response()->json(['success' => 'Showroom Status Updated Successfully']);
        } else {
            return response()->json(['error' => 'Oops! something went wrong']);
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
