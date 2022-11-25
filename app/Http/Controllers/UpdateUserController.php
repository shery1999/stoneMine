<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UpdateUserController extends Controller
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
        // $Data = User::where('id', $id)->get();
        $Data = User::where('id', $id)->first();
        if (!$Data) {
            return redirect()->back()->with(['msgf' => 'Data Not Found']);
        } else {
            return view('update_user', compact('Data'));
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
                'username'         => 'required|max:255',
                'password'         => 'max:255',
                'confirm_password' => 'same:password',
                'role'             => 'required|max:255',
                'email'            => 'max:225|email',
                'email'            =>  Rule::unique('users')->ignore($id),

            ]);
            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Updated']);
            }
        }
        if (!$request->phoneNo == '') {
            $validator = Validator::make($request->all(), [
                'phoneNo' => 'max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Updated']);
            }
        }
        if (!$request->mobileNo == '') {
            $validator = Validator::make($request->all(), [
                'mobileNo' => 'max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Updated']);
            }
        }
        // else
        if (!$validator->fails()) {
            $update = User::where('id', $id)
                ->update([
                    'username' => $request->input('username'),
                    'email' => $request->input('email'),
                    'role' => $request->input('role'),
                    'phoneNo' => $request->input('phoneNo'),
                    'mobileNo' => $request->input('mobileNo'),

                ]);
            if (!$request['password'] == "") {
                $update = User::where('id', $id)
                    ->update([
                        'password' => Hash::make($request['password']),
                    ]);
            }
            return redirect('/add_user')->with(['msg' => 'Record Updated']);
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
