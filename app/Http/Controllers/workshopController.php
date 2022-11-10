<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Workshop;
use Illuminate\Support\Facades\Validator;



class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $workshop_data = Workshop::get();

        return view('add_workshop', compact('workshop_data'));
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
        $validator = Validator::make($request->all(), [
            'workshop' => 'required|unique:workshops|max:255',
            'location' => 'required|max:255',
            'description' => 'max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Submitted']);
        } else {
            $save = Workshop::create([
                'workshop' => $request->input('workshop'),
                'location' => $request->input('location'),
                'description' => $request->input('description'),

            ]);
            return redirect()->back()->with(['msg' => 'Data submitted']);

            return redirect('add_workshop');
        }
    }

    public function  WorkshopUpdateStatus(Request $request)
    {
        $updateUser = Workshop::where('id', $request->id)->update([
            'status' => $request->status
        ]);
        if ($updateUser) {
            return response()->json(['success' => 'Workshop Status Updated Successfully']);
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
