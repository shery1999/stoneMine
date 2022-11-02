@extends('layouts.admin')
@section('titles', 'Add User')
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
        @if (session()->has('msg'))
            @if (session()->has('msg'))
                <div class="alert alert-success" role="alert">
                    User Added Successfully.
                </div>
            @else
                <div class="alert alert-danger" role="alert">
                    Oops! something went wrong.
                </div>
            @endif
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="/add_user" method="post"
                                onsubmit="this.submit(); this.reset(); return false;">
                                @csrf
                                {{-- username --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Username <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input required type="text" class="form-control" id="val-username"
                                            name="username" placeholder="Enter a username..">
                                        @if ($errors->has('username'))
                                            <div class="error">{{ $errors->first('username') }}</div>
                                        @endif
                                    </div>
                                </div>
                                {{-- email --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Email <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input required type="email" class="form-control" id="val-email" name="email"
                                            placeholder="Your valid email..">
                                        @if ($errors->has('email'))
                                            <div class="error">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                </div>
                                {{-- password --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="password">Password <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input required type="password" class="form-control" id="password" name="password"
                                            placeholder="Choose a safe one..">
                                        @if ($errors->has('password'))
                                            <div class="error">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                </div>
                                {{-- confirm password --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="confirm-password">Confirm
                                        Password <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input required type="password" class="form-control" id="confirm-password"
                                            name="confirm_password" placeholder="..and confirm it!">
                                        @if ($errors->has('confirm_password'))
                                            <div class="error">{{ $errors->first('confirm_password') }}</div>
                                        @endif
                                    </div>
                                </div>

                                {{-- phone number --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="phoneus">Phone <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input required type="text" class="form-control" id="val-phoneus1" name="phoneNo"
                                            placeholder="Phone Number">
                                        @if ($errors->has('phoneNo'))
                                            <div class="error">{{ $errors->first('phoneNo') }}</div>
                                        @endif

                                        <h4 class="card-title"></h4>
                                        <h4 class="card-title"></h4>
                                        <input required type="text" class="form-control" id="val-phoneus2"
                                            name="mobileNo" placeholder="Mobile Number">
                                        @if ($errors->has('mobileNo'))
                                            <div class="error">{{ $errors->first('mobileNo') }}</div>
                                        @endif
                                    </div>
                                </div>

                                {{-- add role --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">User Role <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select required type="text" class="form-control" id="val-username"
                                            name="role" placeholder="Enter a user Role..">
                                            <option value="" selected aria-placeholder="Please Select Role">Enter a
                                                user Role.. </option>
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                        @if ($errors->has('role'))
                                            <div class="error">{{ $errors->first('role') }}</div>
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
    </div>
@endsection
