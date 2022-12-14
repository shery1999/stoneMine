<?php

namespace App\Http\Controllers;

use App\Models\Showroom;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


class UpdateShowroomController extends Controller
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
        $Data = Showroom::where('id', $id)->first();
        if (!$Data) {
            return redirect()->back()->with(['msgf' => 'Data Not Found']);
        } else {

            return view('update_showroom', compact('Data'));
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
        if ($request) {
            $validator = Validator::make($request->all(), [
                'ownername' => 'required|max:50',
                'showroomname' => 'required|max:75',
                'showroomname' => Rule::unique('showrooms')->ignore($request->id),
                'email' => 'max:75',
                'email' => Rule::unique('showrooms')->ignore($request->id),
                'adress' => 'required|max:255',
                'city' => 'required|max:255',
                'country' => 'required|max:255',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Updated']);
            }
        }
        if (!$request->phone1 == '') {
            $validator = Validator::make($request->all(), [
                'phone1' => 'max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Updated']);
            }
        }
        if (!$request->phone2 == '') {
            $validator = Validator::make($request->all(), [
                'phone2' => 'max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Updated']);
            }
        }
        if (!$request->phone3 == '') {
            $validator = Validator::make($request->all(), [
                'phone3' => 'max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Updated']);
            }
        }
        if (!$validator->fails()) {
            $update = Showroom::where('id', $id)
                ->update([
                    'ownername' => $request->input('ownername'),
                    'showroomname' => $request->input('showroomname'),
                    'email' => $request->input('email'),
                    'phone1' => $request->input('phone1'),
                    'phone2' => $request->input('phone2'),
                    'phone3' => $request->input('phone3'),
                    'adress' => $request->input('adress'),
                    'city' => $request->input('city'),
                    'country' => $request->input('country'),
                ]);
            return redirect('/add_showroom')->with(['msg' => 'Record Updated']);
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
