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
                            <form class="form-valide" action="/add_user" method="post"
                                {{-- onsubmit="this.submit(); this.reset(); return false;" --}}
                                >
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
                                        <input  type="text" class="form-control" id="val-phoneus1" name="phoneNo"
                                            placeholder="Phone Number">
                                        @if ($errors->has('phoneNo'))
                                            <div class="error">{{ $errors->first('phoneNo') }}</div>
                                        @endif

                                        <h4 class="card-title"></h4>
                                        <h4 class="card-title"></h4>
                                        <input  type="text" class="form-control" id="val-phoneus2"
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

            @if (session()->has('status_update'))
                <div class="col-lg-12">
                    <div class="alert alert-success" role="alert">
                        User Added Successfully.
                    </div>
                </div>
            @endif


            <div class="container-fluid">


                <div class="row">
                    <h1>Block/Unblock Users</h1>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Table</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID</th>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Mobile Number</th>
                                                <th>Phone Number</th>
                                                <th>Role</th>
                                                <th>Date</th>
                                                <th>Edit</th>
                                                <th>Status (Blcked/Unblocked)</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user_data as $key => $item)
                                                <tr>
                                                    {{-- {{ dd($item) }} --}}
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item['id'] }}</td>
                                                    <td>{{ $item['username'] }}</td>
                                                    <td>{{ $item['email'] }}</td>
                                                    <td>{{ $item['phoneNo'] }}</td>
                                                    <td>{{ $item['mobileNo'] }}</td>
                                                    <td>{{ $item['role'] }}</td>
                                                    <td>{{ $item['created_at'] }}</td>
                                                    <td>
                                                        <a href="update_user/{{ $item['id'] }}">
                                                            <button type="button"
                                                                class="use-button btn btn-block btn-warning">Edit</button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <button value="{{ $item['id'] }}" type="button"
                                                            class="use-button btn btn-block userStatusUpdate {{ $item['status'] == 1 ? 'btn-success' : 'btn-danger' }}">{{ $item['status'] == 1 ? 'Active' : 'Block' }}</button>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>ID</th>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Mobile Number</th>
                                                <th>Phone Number</th>
                                                <th>Role</th>
                                                <th>Date</th>
                                                <th>Edit</th>
                                                <th>Status (Blcked/Unblocked)</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <form action="" method="post">
                                        <div class="form-group row">
                                            <div class="col-lg-7 ml-auto">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('.userStatusUpdate').click(function() {
                var user_id = $(this).attr("value");
                var isActive = false;
                var statusVal = 1;

                if ($(this).attr("class").search("btn-success") > 0) {
                    var isActive = true;
                    var statusVal = 0;
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('statusUpdate.post') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: user_id,
                        status: statusVal
                    },
                    success: function(result) {
                        if (result.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'User Status Not Updated',
                                text: result.error,
                            })
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'User Status Updated',
                                text: result.success,
                            })
                            location.reload();
                        }
                    },
                    error: function(result) {
                        location.reload();
                        alert('Error');
                    }
                });
            });
        });
    </script>
