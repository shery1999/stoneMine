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
    <!-- row -->
    <div class="container-fluid">
        <h1>Processed Specimen</h1>
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
                                        <th>Grade</th>
                                        <th>Cut Shape</th>
                                        <th>Dimentions</th>
                                        <th>Weight</th>
                                        <th>Color</th>
                                        <th>Clarity</th>
                                        <th>Treatment</th>
                                        <th>Lab Certificate</th>
                                        <th>Store Location</th>
                                        <th>Image</th>
                                        <th>QR Code</th>
                                        <th>Date</th>
                                        <th>Print</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($processedSpecimen as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->data['id'] }}</td>
                                            <td>{{ $item->data['grade'] }}</td>
                                            <td>{{ $item->data['cut_shape'] }}</td>
                                            <td>{{ $item->data['dimensions'] }}</td>
                                            <td>{{ $item->data['weight'] }}</td>
                                            <td>{{ $item->data['color'] }}</td>
                                            <td>{{ $item->data['clarity'] }}</td>
                                            <td>{{ $item->data['treatment'] }}</td>
                                            <td>{{ $item->data['lab_certificate'] }}</td>
                                            <td>{{ $item->stores['store'] }}</td>
                                            <td>
                                                @if ($item->data['picture'])
                                                <img src="{{ url('/storage/' . $item->data['picture']) }}" height="100px"
                                                width="100px" alt="" title="" />
                                                @endif
                                            </td>
                                            <td>
                                                {{ $item->data['qr_code'] }}
                                                <div class="visible-print text-center">
                                                    {{ $id = $item->data['id'] }}
                                                    {!! QrCode::generate(url('/print_processed/' . $id)) !!}
                                                </div>
                                            </td>
                                            <td>{{ $item->data['created_at'] }}</td>
                                            <td>
                                                <a href="/print_processed/{{ $item['id'] }}">
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
                                        <th>Grade</th>
                                        <th>Cut Shape</th>
                                        <th>Dimentions</th>
                                        <th>Weight</th>
                                        <th>Color</th>
                                        <th>Clarity</th>
                                        <th>Treatment</th>
                                        <th>Lab Certificate</th>
                                        <th>Store Location</th>
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
