@extends('layouts.admin')
@section('titles', 'Grading')
@section('content')

    <div class="container-fluid mt-3">

        @if (session()->has('msg'))

            @if (session()->has('msg'))
                <div class="col-lg-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Data Added Successfully :</strong> To Print details click :
                        <a href="{{ url(Session::get('msg')) }}">
                            <button type="button" class="btn btn-info">Print</button>
                        </a>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
        @endif
        @if (session()->has('msgf'))
            @if (session()->has('msgf'))
                <div class="col-lg-12">
                    <div class="col-lg-12 alert alert-danger" role="alert">
                        Data Not Inserted.
                    </div>
                </div>
            @endif
        @endif


        <form class="form-valide" action="/processed_specimen" method="post" enctype="multipart/form-data"
            onsubmit="this.submit(); this.reset(); return false;">
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
                                    @if ($errors->has('processing_id'))
                                        <div class="error">{{ $errors->first('processing_id') }}</div>
                                    @endif
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
                                    @if ($errors->has('grade'))
                                        <div class="error">{{ $errors->first('grade') }}</div>
                                    @endif
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
                                @if ($errors->has('dimensions'))
                                    <div class="error">{{ $errors->first('dimensions') }}</div>
                                @endif
                            </div>
                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <input required name="weight" type="text" class="form-control input-default"
                                    placeholder="Weight(carats)">
                                @if ($errors->has('weight'))
                                    <div class="error">{{ $errors->first('weight') }}</div>
                                @endif
                            </div>
                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <input name="color" type="text" class="form-control input-default"
                                    placeholder="Colors">
                                @if ($errors->has('color'))
                                    <div class="error">{{ $errors->first('color') }}</div>
                                @endif
                            </div>
                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <input name="clarity" type="text" class="form-control input-default"
                                    placeholder="Clarity">
                                @if ($errors->has('clarity'))
                                    <div class="error">{{ $errors->first('clarity') }}</div>
                                @endif
                            </div>
                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <input name="type" type="text" class="form-control input-default" placeholder="Type">
                                @if ($errors->has('type'))
                                    <div class="error">{{ $errors->first('type') }}</div>
                                @endif
                            </div>
                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <input name="cut_shape" type="text" class="form-control input-default"
                                    placeholder="Cut Shape">
                                @if ($errors->has('cut_shape'))
                                    <div class="error">{{ $errors->first('cut_shape') }}</div>
                                @endif
                            </div>
                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <input name="treatment" type="text" class="form-control input-default"
                                    placeholder="Treatment">
                                @if ($errors->has('treatment'))
                                    <div class="error">{{ $errors->first('treatment') }}</div>
                                @endif
                            </div>
                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <input name="certificate" type="text" class="form-control input-default"
                                    placeholder="Lab Certificate">
                                @if ($errors->has('certificate'))
                                    <div class="error">{{ $errors->first('certificate') }}</div>
                                @endif
                            </div>
                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <textarea name="description" class="form-control h-150px" rows="6" placeholder="Description" id="comment"></textarea>
                                @if ($errors->has('description'))
                                    <div class="error">{{ $errors->first('description') }}</div>
                                @endif
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
                                    <select required name="store" class="custom-select mr-sm-2"
                                        id="inlineFormCustomSelect">
                                        <option value="" selected="selected">Choose...</option>
                                        @foreach ($store_data as $key => $item)
                                            <option value='{{ $item['id'] }}'> {{ $item['store'] }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('store'))
                                        <div class="error">{{ $errors->first('store') }}</div>
                                    @endif
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
                            @if ($errors->has('photo'))
                                <div class="error">{{ $errors->first('photo') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row"> --}}
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Submit</h4>
                        <div class="button-icon">
                            <button type="submit" class="btn mb-1 btn-success">Submit <span class="btn-icon-right"><i
                                        class="fa fa-check"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </form>
    </div>

@endsection
