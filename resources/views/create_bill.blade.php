@extends('layouts.admin')
@section('titles', 'Generate Bill')
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
                        <h4 class="card-title">BUYER SHOWROOM</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Owner Name</th>
                                        <th>Showroom Name</th>
                                        <th>Email</th>
                                        <th>Phone Number 1</th>
                                        <th>Phone number 2</th>
                                        <th>Adress</th>
                                        <th>City</th>
                                        <th>Country</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @for ($i = 0; $i < 1; $i++)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>2System Architect</td>
                                            <td>3Edinburgh</td>
                                            <td>461</td>
                                            <td>52011/04/25</td>
                                            <td>6$320,800</td>
                                            <td>7$320,800</td>
                                            <td>8$320,800</td>
                                            <td>9$320,800</td>
                                        </tr>
                                    @endfor

                                </tbody>
                            </table>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

    @for ($i = 0; $i < 4; $i++)
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Lot ID:</h4>
                            <h4 class="card-title">Lot Price:</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Grade</th>
                                            <th>Cut Shape</th>
                                            <th>Dimentions</th>
                                            <th>Weight</th>
                                            <th>Color</th>
                                            <th>Clarity</th>
                                            <th>Treatment</th>
                                            <th>Lab Certificate</th>
                                            <th>Image</th>
                                            <th>QR Code</th>
                                            <th>Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @for ($i = 0; $i < 13; $i++)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>2System Architect</td>
                                                <td>3Edinburgh</td>
                                                <td>461</td>
                                                <td>52011/04/25</td>
                                                <td>6$320,800</td>
                                                <td>7$320,800</td>
                                                <td>8$320,800</td>
                                                <td>9$320,800</td>
                                                <td>10$320,800</td>
                                                <td>11$320,800</td>
                                                <td>12$320,800</td>
                                            </tr>
                                        @endfor

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Grade</th>
                                            <th>Cut Shape</th>
                                            <th>Dimentions</th>
                                            <th>Weight</th>
                                            <th>Color</th>
                                            <th>Clarity</th>
                                            <th>Treatment</th>
                                            <th>Lab Certificate</th>
                                            <th>Image</th>
                                            <th>QR Code</th>
                                            <th>Date</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <a href=""><button type="submit"
                                                class="btn btn-primary">Save/Print</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endfor
@endsection
