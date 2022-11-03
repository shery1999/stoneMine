@extends('layouts.admin')
@section('titles', 'Create Lot')
@section('content')


    {{-- <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div> --}}

    <div class="container-fluid">
        @if (session()->has('msg'))
            @if (session()->has('msg'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Lot Created Successfully :</strong> To Print details click :
                    <a href="{{ url(Session::get('msg')) }}">
                        <button type="button" class="btn btn-info">Print</button>
                    </a>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        @endif
        @if (session()->has('msgf'))
            @if (session()->has('msgf'))
                <div class="col-lg-12 alert alert-danger" role="alert">
                    Data Not Inserted.
                </div>
            @endif
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">LOT</h4>
                        <div class="table-responsive">
                            <table class="table" id="pdfTab">
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
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody id="clone" class="table_container">

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
                                        <th>Date</th>
                                    </tr>
                                </tfoot>
                            </table>
                            @if ($errors->has('storage_id'))
                                <div style="color: red;font-size: 1rem;" class="error">
                                    {{ 'Please Add From Avaliable Stone Table and Submit again' }}</div>
                            @endif

                        </div>
                    </div>
                    <form action="/create_lot" method="post" onsubmit="this.submit(); this.reset(); return false;">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label ml-5" for="val-lot_price">Enter Price <span
                                    class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input required type="hidden" name="storage_id" id="storage_id" type=""
                                    value="">
                                <input required name="price" type="text" class="form-control ml-5" id="val_lot_price"
                                    name="val-lot_price" placeholder="Price..">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn btn-primary">Create Lot</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Avaliable Stones</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration" id="addpdfTab">
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
                                        <th>Add to Lot</th>

                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($processedSpecimen as $index => $item)
                                        {{-- {{ dd($item->stores['location']) }} --}}
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
                                            <td>{{ $item->stores['location'] }}</td>
                                            {{-- <td>{{ $item->data['picture'] }}</td> --}}
                                            <td>
                                                @if ($item->data['picture'])
                                                    <img src="{{ url('/storage/' . $item->data['picture']) }}"
                                                        height="100px" width="150px" alt="" title="" />
                                                @endif
                                            </td>
                                            <td>
                                                {{ $item->data['qr_code'] }}
                                                <div class="visible-print text-center">
                                                    {{ $id = $item->data['id'] }}
                                                    {!! QrCode::generate(url('/print_details/' . $id)) !!}
                                                </div>
                                            </td>
                                            <td>{{ $item->data['created_at'] }}</td>
                                            <td> <button type="button" class="use-button  btn mb-1 btn-primary">Add to Lot
                                                    <span class=" btn-icon-right"><i class="fa fa-shopping-cart"></i></span>
                                                </button>
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
                                        <th>Add to Lot</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- #/ container -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <script>
        let sno = 0;
        const lot = [];
        document.getElementById("storage_id").innerHTML = lot;
        document.getElementById("storage_id").value = lot;
        console.log(lot)
        // (json_encode(lot));
        // console.log(lot);

        $(".use-button").click(function() {
            var row = $(this).closest("tr");
            var id = row.find("td")[1].textContent;
            lot.push(id);
            document.getElementById("storage_id").value = lot;
            var grade = row.find("td")[2].textContent;
            var cut_shape = row.find("td")[3].textContent;
            var dimention = row.find("td")[4].textContent;
            var weight = row.find("td")[5].textContent;
            var color = row.find("td")[6].textContent;
            var clarity = row.find("td")[7].textContent;
            var treatment = row.find("td")[8].textContent;
            var lab_certificate = row.find("td")[9].textContent;
            var store = row.find("td")[10].textContent;
            var date = row.find("td")[13].textContent;
            sno++;
            console.log(lot)
            row.remove();
            row.hide();
            var newRow =

                "<tr><td>" + sno +
                "</td><td>" + id +
                "</td><td>" + grade +
                "</td><td>" + cut_shape +
                "</td><td>" + dimention +
                "</td><td>" + weight +
                "</td><td>" + color +
                "</td><td>" + clarity +
                "</td><td>" + treatment +
                "</td><td>" + lab_certificate +
                "</td><td>" + store +
                "</td><td>" + date +
                "</td><tr>";
            $("#pdfTab").append(newRow);
        });
    </script>


@endsection
