<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_data = User::get();
        return view('add_user', compact('user_data'));
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
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:8|max:255',
            'confirm_password' => 'required|same:password',
            'role' => 'required|max:255',
            'phoneNo' => 'max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
            'mobileNo' => 'max:20|regex:/^([0-9\s\-\+\(\)]*)$/',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with(['msgf' => 'Data Not Submitted']);
        } else {
            $save = User::create([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => Hash::make($request['password']),
                'role' => $request->input('role'),
                'phoneNo' => $request->input('phoneNo'),
                'mobileNo' => $request->input('mobileNo'),

            ]);
            return redirect()->back()->with(['msg' => 'data submitted']);
        }
    }

    public function  updateStatus(Request $request)
    {
        if ($request->id == Auth::user()->id) {
            return response()->json(['error' => 'Sorry you are logged in currently, cannot block this account']);
        } else {

            $updateUser = User::where('id', $request->id)->update([
                'status' => $request->status
            ]);
            if ($updateUser) {
                return response()->json(['success' => 'User Status Updated Successfully']);
            } else {
                return response()->json(['error' => 'Oops! something went wrong'])->with(['status_error' => 'Oops! something went wrong']);
            }
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
