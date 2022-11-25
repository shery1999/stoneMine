<?php

namespace App\Http\Controllers;

use App\Models\ProcessedGrading;
use App\Models\SecondStorage;
use App\Models\Store;
use App\Models\Processing;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;



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
        $processing_data = Processing::get();
        $store_data = Store::where('status', 1)->get();

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
        $picture = "";
        $validator = Validator::make($request->all(), [
            'processing_id' => 'required|max:15',
            'store' =>         'required|max:15',
            'grade' =>         'required|max:15',
            'dimensions' =>    'required|max:25',
            'weight' =>        'required|max:25',
            'color' =>         'required|max:25',
            'clarity' =>       'required|max:75',
            'treatment' =>     'required|max:155',
            'type' =>          'required|max:55',
            'cut_shape' =>     'required|max:55',
            'certificate' =>   'required|max:155',
            'description' =>   'max:255',
            'photo' =>         'image|mimes:jpeg,png,jpg,gif|max:5500'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with(['msgf' => "Data not inserted"]);
        } else {
            if ($request->file('photo')) {
                // $photo = $request->file('photo')->store('processed_stone_images', ['disk' => 'public']);
                File::ensureDirectoryExists('storage/processed_stone_images');

                $destinationPath = 'storage/processed_stone_images';
                $image = $request->file('photo');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imgFile = Image::make($image->getRealPath());
                $img = $imgFile->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $imageName, 80);
                $picture = "processed_stone_images/" . $imageName;
            } else {
                $photo = null;
            }
            $saveProcessedGrading = ProcessedGrading::create([

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
                'picture' => $picture,
            ]);
            if (!$request->store = "") {
                if ($request->input('store'))
                    $save = SecondStorage::create([
                        'store_id' => $request->input('store'),
                        'processed_grading_id' => $saveProcessedGrading['id'],
                        'user_id' => Auth()->user()->id,
                        'description' => $request->input('description'),
                    ]);
            }
            $processing_id =  $saveProcessedGrading['processing_id'];
            $updateStaus = Processing::where('id', $processing_id)
                ->update(
                    ['status' => 1]
                );
            $id = $save['id'];
            return redirect()->back()->with(['msg' => '/print_processed/' . $id,]);
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
