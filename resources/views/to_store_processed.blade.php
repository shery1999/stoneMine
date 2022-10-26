@extends('layouts.admin')
@section('titles', 'to Store')
@section('content')
    <div class="container-fluid mt-3">
        <div>
            <form class="form-valide" action="/to_store_processed" method="post" onsubmit="this.submit(); this.reset(); return false;">
                @csrf
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h2>Update Store Location</h2>
                            <h4 class="card-title"></h4>
                            <h4 class="card-title"></h4>
                            <h4 class="card-title">Select Store</h4>
                            <div class="basic-form">
                                <div class="form-row align-items-center">
                                    <div class="col-auto my-1">
                                        <label class="mr-sm-2">Options</label>
                                        <select name="store" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                            <option selected="selected">Choose...</option>
                                            @foreach ($store_data as $key => $item)
                                                <option value='{{ $item['id'] }}'>{{ $item['store'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title"></h4>
                            <h4 class="card-title"></h4>
                            <h4 class="card-title">Processed Stone ID</h4>
                            <div class="basic-form">
                                <div class="form-row align-items-center">
                                    <div class="col-auto my-1">
                                        <label class="mr-sm-2">Options</label>
                                        <select name="processeed_specimen" class="custom-select mr-sm-2"
                                            id="inlineFormCustomSelect">
                                            <option selected="selected">Choose...</option>
                                            @foreach ($stone_data as $key => $item)
                                                <option value='{{ $item['processed_grading_id'] }}'>{{ $item['processed_grading_id'] }}
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
                                    <textarea name="description" class="form-control h-150px" rows="6" placeholder="Description" id="comment"></textarea>
                                </div>
                                <h4 class="card-title"></h4>
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
    </div>
@endsection
