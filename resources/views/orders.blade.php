@extends('layouts.admin')
@section('titles', 'View Sold Orders')
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
                        <h4 class="card-title">SELECT LOT</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>SNo</th>
                                        <th>Lot ID</th>
                                        <th>Buyer Name</th>
                                        <th>Buyer Showroom Name</th>
                                        <th>QR Code</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th>Print</th>

                                        {{-- @foreach ($processed_stones_data[0] as $key => $item)
                                        
                                            <th>Stone {{ $key + 1 }} Id </th>
                                            <th>Stone Weight</th>
                                            <th>Stone Size</th>
                                        @endforeach --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Data as $key => $data)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $Data[$key]['lot_id'] }}</td>
                                            <td>{{ $Data[$key]->Showroom['ownername'] }}</td>
                                            <td>{{ $Data[$key]->Showroom['showroomname'] }}</td>
                                            {{ $id_data = $Data[$key]['lot_id'] }}
                                            <td>
                                                <div class="visible-print text-center">
                                                    {!! QrCode::size(50)->generate("orders/$id_data ") !!}
                                                </div>
                                                QR CODE new
                                            </td>

                                            <td>{{ $Data[$key]->Data['price'] }}</td>
                                            <td>{{ $Data[$key]['updated_at'] }}</td>
                                            <td>
                                                <a href="/print/{{$Data[$key]['lot_id']}}">
                                                    <button type="button" class="btn btn-block btn-success">Print</button>
                                                </a>
                                            </td>
                                        <tr>
                                            <th>Stone Id </th>
                                            <th>Stone Weight</th>
                                            <th>Stone Size</th>
                                        </tr>
                                        @foreach ($processed_stones_data[$key] as $key1 => $item)
                                            <tr>
                                                <td>{{ $item['id'] }}</td>
                                                <td>{{ $item['dimensions'] }}</td>
                                                <td>{{ $item['weight'] }}</td>
                                            </tr>
                                        @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SNo</th>
                                        <th>Lot ID</th>
                                        <th>Buyer Name</th>
                                        <th>Buyer Showroom Name</th>
                                        <th>QR Code</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th>Print</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
