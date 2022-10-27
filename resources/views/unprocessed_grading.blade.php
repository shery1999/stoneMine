@extends('layouts.admin')
@section('titles', 'Unprocessed Grading')
@section('content')

    <div class="container-fluid mt-3">

        <form class="form-valide" action="/unprocessed_grading" method="post" enctype="multipart/form-data"
            onsubmit="this.submit(); this.reset(); return false;">
            @csrf
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <h4 class="card-title">Specimen type </h4>
                        <h4 class="card-title"></h4>
                        <h4 class="card-title"></h4>
                        <div class="basic-form">
                            <div class="form-group">
                                <h4 class="card-title"></h4>
                                <h4 class="card-title"></h4>
                                <div class="radio mb-3">
                                    <label>
                                        <input required type="radio" value="bag" name="specimen/bag">Bag</label>
                                </div>
                                <div class="radio mb-3">
                                    <label>
                                        <input required type="radio" value="specimen" name="specimen/bag">Specimen</label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <h4 class="card-title"></h4>
                        <h4 class="card-title">Mine</h4>
                        <div class="basic-form">

                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2">Options</label>
                                    <select required name="mine" class="custom-select mr-sm-2"
                                        id="inlineFormCustomSelect">
                                        <option value="" selected="selected">Choose...</option>
                                        @foreach ($mine_data as $key => $item)
                                            <option value='{{ $item['id'] }}'>{{ $item['mine'] }}
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
                                        <option value="A +">A+</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <h4 class="card-title"></h4>
                        <h4 class="card-title"></h4>
                        <h4 class="card-title">Store</h4>
                        <div class="basic-form">

                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2">Options</label>
                                    <select required name="store" class="custom-select mr-sm-2"
                                        id="inlineFormCustomSelect">
                                        <option value="" selected="selected">Choose...</option>
                                        @foreach ($store_data as $key => $item)
                                            <option value='{{ $item['id'] }}'>{{ $item['store'] }}
                                            </option>
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
                        <h4 class="card-title">Details</h4>
                        <p class="text-muted m-b-15 f-s-12"><code></code></p>
                        <div class="basic-form">

                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <input required type="text" class="form-control input-default" name="weight"
                                    placeholder="Weight">
                            </div>
                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <input required type="text" class="form-control input-default" name="size"
                                    placeholder="Size">
                            </div>
                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <textarea class="form-control h-150px" rows="6" placeholder="Description" name="description" id="comment"></textarea>
                            </div>
                            <h4 class="card-title"></h4>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Image Upload</h4>
                        <div class="basic-form">
                            <form action="#">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input">
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