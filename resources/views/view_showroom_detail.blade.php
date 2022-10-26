@extends('layouts.admin')
@section('titles', 'Select Lot')
@section('content')

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">SHOWROOM</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Owner Name</th>
                                        <th>Showroom Name</th>
                                        <th>Phone Number 1</th>
                                        <th>Phone number 2</th>
                                        <th>Phone number 3</th>
                                        <th>Adress</th>
                                        <th>City</th>
                                        <th>Country</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($showroom_data as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item['id'] }}</td>
                                            <td>{{ $item['ownername'] }}</td>
                                            <td>{{ $item['showroomname'] }}</td>
                                            <td>{{ $item['phone1'] }}</td>
                                            <td>{{ $item['phone2'] }}</td>
                                            <td>{{ $item['phone3'] }}</td>
                                            <td>{{ $item['adress'] }}</td>
                                            <td>{{ $item['city'] }}</td>
                                            <td>{{ $item['country'] }}</td>
                                            <td>{{ $item['created_at'] }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Owner Name</th>
                                        <th>Showroom Name</th>
                                        <th>Phone Number 1</th>
                                        <th>Phone number 2</th>
                                        <th>Adress</th>
                                        <th>City</th>
                                        <th>Country</th>
                                        <th>Date</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-8 ml-auto">
                            {{-- <button type="submit" class="btn btn-primary">Proceed to Payment</button> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
