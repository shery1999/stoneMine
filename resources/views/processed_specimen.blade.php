@extends('layouts.admin')
@section('titles', 'Grading')
@section('content')

    <div class="container-fluid mt-3">
        <form class="form-valide" action="/processed_specimen" method="post" enctype="multipart/form-data" onsubmit="this.submit(); this.reset(); return false;">
            @csrf
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <h4 class="card-title"></h4>
                        <h4 class="card-title">Bag/Specimen ID</h4>
                        <div class="basic-form">
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2">Options</label>
                                    <select required name="processing_id" class="custom-select mr-sm-2"
                                        id="inlineFormCustomSelect">
                                        <option value="" selected="selected">Choose...</option>
                                        @foreach ($processing_data as $key => $item)
                                            <option value='{{ $item['id'] }}'>
                                                {{ $item['unprocessed_grading_id'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <h4 class="card-title"></h4>
                        <h4 class="card-title"></h4>
                        <h4 class="card-title">Grade</h4>
                        <div class="basic-form">

                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2">Options</label>
                                    <select required name="grade" class="custom-select mr-sm-2"
                                        id="inlineFormCustomSelect">
                                        <option value="" selected="selected">Choose...</option>
                                        <option value="AAA+">AAA+</option>
                                        <option value="AAA">AAA</option>
                                        <option value="AA+">AA+</option>
                                        <option value="AA">AA</option>
                                        <option value="AA-">AA-</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <h4 class="card-title"></h4>
                        <h4 class="card-title"></h4>
                        <h4 class="card-title">Details</h4>
                        <p class="text-muted m-b-15 f-s-12"><code></code></p>
                        <div class="basic-form">

                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <input required name="dimensions" type="text" class="form-control input-default"
                                    placeholder="Dimensions(mm)">
                            </div>
                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <input required name="weight" type="text" class="form-control input-default"
                                    placeholder="Weight(carats)">
                            </div>
                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <input name="color" type="text" class="form-control input-default"
                                    placeholder="Colors">
                            </div>
                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <input name="clarity" type="text" class="form-control input-default"
                                    placeholder="Clarity">
                            </div>
                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <input name="type" type="text" class="form-control input-default" placeholder="Type">
                            </div>
                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <input name="cut_shape" type="text" class="form-control input-default"
                                    placeholder="Cut Shape">
                            </div>
                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <input name="treatment" type="text" class="form-control input-default"
                                    placeholder="Treatment">
                            </div>
                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <input name="certificate" type="text" class="form-control input-default"
                                    placeholder="Lab Certificate">
                            </div>
                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <textarea name="description" class="form-control h-150px" rows="6" placeholder="Description" id="comment"></textarea>
                            </div>
                            <h4 class="card-title"></h4>

                        </div>
                        <h4 class="card-title"></h4>
                        <h4 class="card-title"></h4>
                        <h4 class="card-title">Store location</h4>
                        <div class="basic-form">
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2">Options</label>
                                    <select required name="store" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option value="" selected="selected">Choose...</option>
                                        @foreach ($store_data as $key => $item)
                                            <option value='{{ $item['id'] }}'> {{ $item['store'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Image Upload</h4>
                        <div class="basic-form">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name='photo' type="file" class="custom-file-input">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Submit</h4>
                            <div class="button-icon">
                                <button type="submit" class="btn mb-1 btn-success">Submit <span
                                        class="btn-icon-right"><i class="fa fa-check"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
