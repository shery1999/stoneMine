@extends('layouts.admin')
@section('titles', 'list')
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
        <h1>Unprocessed Grading</h1>
        <div class="row">
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
                                        <th>Specimen Type</th>
                                        <th>Grade</th>
                                        <th>Size</th>
                                        <th>Origin Mine</th>
                                        <th>Storage location</th>
                                        <th>Image</th>
                                        <th>QR Code</th>
                                        <th>Date</th>
                                        <th>Print</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($firstGrading as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->unprocessed_grading_data['id'] }}</td>
                                            <td>{{ $item->unprocessed_grading_data['specimen/bag'] }}</td>
                                            <td>{{ $item->unprocessed_grading_data['grade'] }}</td>
                                            <td>{{ $item->unprocessed_grading_data['size'] }}</td>
                                            <td>{{ $item->unprocessed_grading_data->mines['location'] }}</td>
                                            <td>{{ $item->stores['store'] }}</td>
                                            <td><img src="{{ url('/storage/' . $item->unprocessed_grading_data['picture']) }}"
                                                    height="100px" width="150px" alt="" title="" /></td>
                                            <td>
                                                {{ $item->unprocessed_grading_data['qr_code'] }}
                                                <div class="visible-print text-center">
                                                    {{ $id = $item['unprocessed_grading_id'] }}
                                                    {!! QrCode::generate(url('/print_details/' . $id)) !!}
                                                </div>
                                            </td>
                                            <td>{{ $item['created_at'] }}</td>
                                            <td>
                                                <a href="/print_processed/{{ $item['unprocessed_grading_id'] }}">
                                                    <button type="button" class="btn btn-block btn-success">Print</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Specimen Type</th>
                                        <th>Grade</th>
                                        <th>Size</th>
                                        <th>Origin Mine</th>
                                        <th>Storage location</th>
                                        <th>Image</th>
                                        <th>QR Code</th>
                                        <th>Date</th>
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
