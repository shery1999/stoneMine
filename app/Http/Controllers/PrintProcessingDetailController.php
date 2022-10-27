<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\MultipleProcessingIds;
use App\Models\unprocessed_grading;

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
            $Data[] = unprocessed_grading::whereIn('id', $unprocessed_ids)->get();
        }
        return view('print_processing_details', compact('Data', 'MultipleData'));
    }
}