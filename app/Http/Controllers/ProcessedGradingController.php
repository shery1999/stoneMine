<?php

namespace App\Http\Controllers;

use App\Models\ProcessedGrading;
use App\Models\Second_storage;
use App\Models\store;
use App\Models\processing;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class ProcessedGradingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processing_data = processing::get();
        $store_data = store::get();

        return view('processed_specimen', compact('processing_data', 'store_data'));
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
            // dd($request->all()),
            'processing_id' => 'required|max:255',
            'store' =>         'required|max:255',
            'grade' =>         'required|max:255',
            'dimensions' =>    'required|max:255',
            'weight' =>        'required|max:255',
            'color' =>         'required|max:255',
            'clarity' =>       'required|max:255',
            'treatment' =>     'required|max:255',
            'type' =>          'required|max:255',
            'cut_shape' =>     'required|max:255',
            'certificate' =>   'required|max:255',
            'description' =>   'max:255',
            'photo' =>         'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            // dd("test pass");
            if ($request->file('photo')) {

                $photo = $request->file('photo')->store('processed_stone_images', ['disk' => 'public']);
            } else {
                $photo = null;
            }

            $save = ProcessedGrading::create([

                'processing_id' => $request->input('processing_id'),
                'grade' => $request->input('grade'),
                'dimensions' => $request->input('dimensions'),
                'weight' => $request->input('weight'),
                'color' => $request->input('color'),
                'clarity' => $request->input('clarity'),
                'treatment' => $request->input('treatment'),
                'type' => $request->input('type'),
                'cut_shape' => $request->input('cut_shape'),
                'lab_certificate' => $request->input('certificate'),
                'store' => $request->input('store'),
                'user_id' => Auth()->user()->id,
                'picture' => $photo,
            ]);
            $processing_id =  $save['processing_id'];
            $updateStaus = processing::where('id', $processing_id)
                ->update(
                    ['status' => 1]
                );
            if (!$request->store = "") {
                if ($request->input('store'))
                    $save = Second_storage::create([
                        'store_id' => $request->input('store'),
                        'processed_grading_id' => $save['id'],
                        'user_id' => Auth()->user()->id,
                        'description' => $request->input('description'),
                    ]);

                $id = $save['id'];
                return redirect('/print_processed/' . $id);
            }
            return redirect('processed_specimen');
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
