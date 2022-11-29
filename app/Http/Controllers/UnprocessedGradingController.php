<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnprocessedGrading;
use App\Models\Mine;
use App\Models\Store;
use App\Models\FirstStorage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class UnprocessedGradingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mine_data = Mine::where('status', 1)->get();
        $store_data = Store::where('status', 1)->get();
        return view('unprocessed_grading', compact('mine_data', 'store_data'));
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
        $picture = "";
        $validator = Validator::make($request->all(), [
            'specimen/bag' => 'required|max:255',
            'mine' => 'required|max:55',
            'grade' => 'required|max:55',
            'store' => 'required|max:55',
            'size' => 'required|max:55',
            'weight' => 'required|max:55',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5500',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with(['msgf' => "Data not inserted"]);
        } else {
            $imageName = '';
            if ($request->file('image')) {
                File::ensureDirectoryExists('/home/bitnami/htdocs/public/storage/unprocessed_stone_images/');
                $destinationPath = '/home/bitnami/htdocs/public/storage/unprocessed_stone_images/';

                // dd($destinationPath);
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imgFile = Image::make($image->getRealPath());
                $img = $imgFile->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $imageName, 80);
                $picture = "unprocessed_stone_images/" . $imageName;
                // $photo = $imgFile->store('unprocessed_stone_images', ['disk' => 'public']);
            } else {
                $photo = null;
            }
            $save = UnprocessedGrading::create([
                'specimen/bag' => $request->input('specimen/bag'),
                'grade' => $request->input('grade'),
                'weight' => $request->input('weight'),
                'size' => $request->input('size'),
                'qr_code' => $request->input('qr_code'),
                'mine_id' => $request->input('mine'),
                'user_id' => Auth()->user()->id,
                'store_id' => $request->input('store'),
                'picture' => $picture,
            ]);
            $save2 = FirstStorage::create([
                'store_id' => $request->input('store'),
                'user_id' => Auth()->user()->id,
                'unprocessed_grading_id' => $save['id'],
            ]);
            $id = $save2['id'];
            return redirect()->back()->with(['msg' => '/print_details/' . $id,]);
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
