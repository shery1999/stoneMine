<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <canvas id="myChart" height="100px"></canvas>
</body>


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
                barThickness: 6,
                maxBarThickness: 8,
                minBarLength: 2,
                label: 'Unprocessed',
                backgroundColor: 'rgb(0,250,154)',
                borderColor: 'rgb(0,250,154)',
                data: users1,
            },
            {
                barPercentage: 0.5,
                barThickness: 6,
                maxBarThickness: 8,
                minBarLength: 2,
                label: 'Processed',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: users2,
            },
            {
                barPercentage: 0.5,
                barThickness: 6,
                maxBarThickness: 8,
                minBarLength: 2,
                label: 'Processing',
                backgroundColor: 'rgb(0,0,255)',
                borderColor: 'rgb(0,0,255)',
                data: users3,
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

</html>
