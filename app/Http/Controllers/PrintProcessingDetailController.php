<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MultipleProcessingIds;
use App\Models\UnprocessedGrading;
use App\Models\Processing;

class PrintProcessingDetailController extends Controller
{
    //
    public function index()
    {
        $id =  request()->route()->parameters['id'];
        $MultipleData = MultipleProcessingIds::where('id', $id)->get();
        $ids = explode(',', $MultipleData[0]['processing_ids']);

        foreach ($ids as $key => $value) {
            $unprocessed_ids = explode('|', $value);
            $Data[] = UnprocessedGrading::whereIn('id', $unprocessed_ids)->get();
            $workshopData = Processing::where('unprocessed_grading_id', $unprocessed_ids)->with('workshop')->get();
        }
        return view('print_processing_details', compact('Data', 'MultipleData', 'workshopData'));
    }
}
