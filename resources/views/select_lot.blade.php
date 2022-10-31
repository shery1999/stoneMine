@extends('layouts.admin')
@section('titles', 'Create Lot')
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
        @if (!session()->has('msg'))
            <script>
                window.location = "/create_lot";
            </script>

        @endif
        @if (session()->has('msg'))
            @if (session()->has('msg'))
                <div class="alert alert-success" role="alert">
                    Lot Created Successfully.Please Select Showroom and Submit.
                </div>
            @else
                <div class="alert alert-danger" role="alert">
                    Oops! something went wrong.
                </div>
            @endif
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="/select_lot" method="post" onsubmit="this.submit(); this.reset(); return false;">


                        <div class="card-body">
                            <h4 class="card-title">Showrooms</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>#</th>
                                            <th>Owner Name</th>
                                            <th>Showroom Name</th>
                                            <th>Phone 1</th>
                                            <th>Phone 2</th>
                                            <th>Phone 3</th>
                                            <th>Adress</th>
                                            <th>City</th>
                                            <th>Country</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    @csrf
                                    <tbody>

                                        @foreach ($showroom_data as $index => $item)
                                            <tr>
                                                <td>  <input class="use-button" type="radio" id="css"
                                                        name="showroom" value="{{ $item['id'] }}">{{ $item['id'] }}
                                                </td>
                                                <td>{{ $index + 1 }}</td>
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
                                            <th>Select</th>
                                            <th>#</th>
                                            <th>Owner Name</th>
                                            <th>Showroom Name</th>
                                            <th>Phone 1</th>
                                            <th>Phone 2</th>
                                            <th>Phone 3</th>
                                            <th>Adress</th>
                                            <th>City</th>
                                            <th>Country</th>
                                            <th>Date</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <input type="hidden" name="lot_id_data"
                                    value="{{ request()->route()->parameters['slug_id'] }}">
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                    </form>
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
        console.log("point A")

        $(".use-button").checked(function() {
            console.log("point B")
            var row = $(this).closest("tr");
            var id = row.find("td")[1].textContent;
            lot.push(id);
            document.getElementById("storage_id").value = lot;
            console.log(lot)
            row.remove();
            row.hide();
            var newRow =

                "<tr><td>" + sno +
                $("#pdfTab").append(newRow);
        });
    </script>


@endsection
