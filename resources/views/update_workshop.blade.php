@extends('layouts.admin')
@section('titles', 'Update Workshop')
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

    <div class="row justify-content-center">
        <div class="container-fluid">
            @if (session()->has('msg'))
                @if (session()->has('msg'))
                    <div class="col-lg-12">
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('msg') }}
                        </div>
                    </div>
                @endif
            @endif
            @if (session()->has('msgf'))
                @if (session()->has('msgf'))
                    <div class="col-lg-12">
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('msgf') }}
                        </div>
                    </div>
                @endif
            @endif
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="/update_workshop/{{ $Data['id'] }}" method="post"
                                onsubmit="this.submit(); this.reset(); return false;">
                                @csrf
                                @method('PUT')
                                {{-- workshop name --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-minename">Workshop name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input required type="text" class="form-control" id="workshopname"
                                            value="{{ $Data['workshop'] }}" name="workshop" placeholder="Workshop name..">
                                        @if ($errors->has('workshop'))
                                            <div class="error">{{ $errors->first('workshop') }}</div>
                                        @endif
                                    </div>
                                </div>
                                {{-- location --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="location">location <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" required class="form-control" id="val-email" name="location"
                                            value="{{ $Data['location'] }}" placeholder="location..">
                                        @if ($errors->has('location'))
                                            <div class="error">{{ $errors->first('location') }}</div>
                                        @endif
                                    </div>
                                </div>
                                {{-- description --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-description">Description
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="val-description" name="description" rows="5" placeholder="Enter Description">value="{{ $Data['description'] }}"</textarea>
                                        @if ($errors->has('description'))
                                            <div class="error">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                </div>

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
    @endsection
