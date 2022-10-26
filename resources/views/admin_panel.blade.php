@extends('layouts.admin')
@section('titles', 'Admin Panel')
@section('content')


    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Unprocessed Specimen/Bag in Store</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $first_storage }}</h2>
                            <p class="text-white mb-0">Total = {{ $first_storage_total }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-bag"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Under Processing</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $processing }}</h2>
                            <p class="text-white mb-0">Total = {{ $processing_total }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-spinner fa-pulse"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Processed Specimen in Store</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $second_storage }}</h2>
                            <p class="text-white mb-0">Total = {{ $second_storage_total }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-diamond"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Orders Completed</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $order }}</h2>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-credit-card"></i></span>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0 d-flex justify-content-between">
                                <div>
                                    <h4 class="mb-1">Inventory</h4>
                                    <p>Per Month</p>
                                    <h3 class="m-0"></h3>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="myChart" height="100px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
    var labels1 = {{ Js::from($labels1) }};
    var users1 = {{ Js::from($data1) }};
    var labels2 = {{ Js::from($labels2) }};
    var users2 = {{ Js::from($data2) }};
    var labels3 = {{ Js::from($labels3) }};
    var users3 = {{ Js::from($data3) }};

    const data = {
        labels: labels1,
        datasets: [{
                barPercentage: 0.5,
                barThickness: 20,
                maxBarThickness: 20,
                minBarLength: 2,
                label: 'Unprocessed',
                backgroundColor: 'rgb(124,106,250)',
                borderColor: 'rgb(124,106,250)',
                data: users1,
            },
            {
                barPercentage: 0.5,
                barThickness: 22,
                maxBarThickness: 22,
                minBarLength: 2,
                label: 'Processing',
                backgroundColor: 'rgb(252,125,148)',
                borderColor: 'rgb(252,125,148)',
                data: users3,
            },
            {
                barPercentage: 0.5,
                barThickness: 20,
                maxBarThickness: 22,
                minBarLength: 2,
                label: 'Processed',
                backgroundColor: 'rgb(255,154,91)',
                borderColor: 'rgb(255,154,91)',
                data: users2,
            },
        ]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>
@endsection
