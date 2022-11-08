@extends('layouts.admin')
@section('titles', 'Add Store')
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
                            Store Added Successfully.
                        </div>
                    </div>
                @endif
            @endif
            @if (session()->has('msgf'))
                @if (session()->has('msgf'))
                    <div class="col-lg-12">
                        <div class="alert alert-danger" role="alert">
                            Store Not Added.
                        </div>
                    </div>
                @endif
            @endif
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="/add_store" method="post"
                                onsubmit="this.submit(); this.reset(); return false;">
                                @csrf
                                {{-- store name --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-minename">Store name <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input required type="text" class="form-control" id="val- storename"
                                            name="store" placeholder="Store name..">
                                        @if ($errors->has('store'))
                                            <div class="error">{{ $errors->first('store') }}</div>
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
                                        @if ($errors->has('location'))
                                            <div class="error">{{ $errors->first('location') }}</div>
                                        @endif
                                    </div>
                                </div>
                                {{-- description --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-description">description
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="val-description" name="description" rows="5" placeholder="Enter Description"></textarea>
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



            <div class="container-fluid">


                <div class="row">
                    <h1>Block/Unblock Stores</h1>
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
                                                <th>Store Name</th>
                                                <th>Store Location</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th>Status (Blcked/Unblocked)</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($store_data as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item['id'] }}</td>
                                                    <td>{{ $item['store'] }}</td>
                                                    <td>{{ $item['location'] }}</td>
                                                    <td>{{ $item['description'] }}</td>
                                                    <td>{{ $item['created_at'] }}</td>
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
                                                <th>Mine Name</th>
                                                <th>Mine Location</th>
                                                <th>Description</th>
                                                <th>Date</th>
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
                    url: "{{ route('storestatusUpdate.post') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: user_id,
                        status: statusVal
                    },
                    success: function(result) {
                        if (result.error) {
                            // alert(result.error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Store Status Not Updated',
                                text: result.error,
                            })

                        } else {
                            // alert(result.success);
                            Swal.fire({
                                icon: 'success',
                                title: 'Store Status Updated',
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



    {{-- </div>
    </div>
@endsection --}}
