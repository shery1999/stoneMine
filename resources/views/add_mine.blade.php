@extends('layouts.admin')
@section('titles', 'Add Mine')
@section('content')
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="/add_mine" method="post" onsubmit="this.submit(); this.reset(); return false;">
                                @csrf
                                {{-- username --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-minename">Mine name <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input required type="text" class="form-control" id="val- minename"
                                            name="mine" placeholder="Mine name..">
                                        @if ($errors->has('mine'))
                                            <div class="error">{{ $errors->first('username') }}</div>
                                        @endif
                                    </div>
                                </div>
                                {{-- location --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-location">location <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input required type="text" class="form-control" id="val-email" name="location"
                                            placeholder="location..">
                                    </div>
                                </div>
                                {{-- description --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-description">description <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="val-description" name="description" rows="5" placeholder="Enter Description"></textarea>
                                    </div>
                                </div>
                                {{-- submit --}}
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
