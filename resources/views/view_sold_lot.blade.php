@extends('layouts.admin')
@section('titles', 'View Sold Lots')
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
                        <h4 class="card-title">Sold Lots:</h4>
                        <h4 class="card-title">Lot Price:</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Buyer ID</th>
                                        <th>Lot ID</th>
                                        <th>Buyer Name</th>
                                        <th>Buyer Showroom Name</th>
                                        <th>QR Code</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th>View Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{ dd($processed_stones_data) }} --}}
                                    {{-- {{ dd($Data) }} --}}
                                    @foreach ($Data as $index => $item)
                                        @for ($i = 0; $i < 13; $i++)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>2System Architect</td>
                                                <td>3Edinburgh</td>
                                                <td>461</td>
                                                <td>52011/04/25</td>
                                                <td>6$320,800</td>
                                                <td>6$320,800</td>
                                                <td>7$320,800</td>
                                                <td><a href="/create_bill"> <button type="button"
                                                            class="btn mb-1 btn-warning">View<span class="btn-icon-right"><i
                                                                    class="fa fa-star"></i></span></a>
                                                    </button></td>
                                                </td>
                                            </tr>
                                        @endfor

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Buyer ID</th>
                                        <th>Lot ID</th>
                                        <th>Buyer Name</th>
                                        <th>Buyer Showroom Name</th>
                                        <th>QR Code</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th>View Detail</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <a href="/select_lot"><button type="submit"
                                            class="btn btn-primary">Save/Print</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection