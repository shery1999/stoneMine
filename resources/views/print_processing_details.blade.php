<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Syne+Tactile&display=swap"
        rel="stylesheet">
    <title>Details</title>
    <style>
        body {
            background-color: rgb(229, 229, 229);
            font-family: 'Roboto', sans-serif;
        }

        .blue {
            color: rgb(1, 116, 177);
            font-weight: 500
                /* font-size: 2vw; */
        }

        .textsize {
            font-size: 2vw;
        }

        .textbold {
            font-weight: 700;
        }

        .weigthbold {
            font-weight: bold;
            font-size: 2.5vw;
        }

        p {
            font-size: 1.4vw;
            margin-top: 0;
            margin-bottom: 0rem;
        }

        .logoFont {
            font-size: 1.5vw;
        }

        .bgcol {
            background-color: rgb(1, 116, 177);
            color: rgb(229, 229, 229);
            border-bottom: 7px solid rgb(69, 69, 71);
        }

        .bgcolnew {
            background-color: rgb(1, 116, 177);
            color: rgb(229, 229, 229);
        }

        .bgcol h1 {
            font-size: 6vw;
        }

        .table {
            width: 100%;
            margin-bottom: 0rem;
            color: #212529;
        }

        .bfooter {
            background-color: rgb(69, 69, 71);
            color: white;
        }

        @media print {
            .table tr th {
                background-color: rgb(1, 116, 177) ! important;
                color: rgb(229, 229, 229);
            }

            .table th {
                background-color: rgb(1, 116, 177) ! important;
            }

            .table td,
            .table th {
                background-color: inherit !important;
            }

            .table-stripe {
                background-color: #dedede !important;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">

        <div class="row bgcol">
            <div class="col-3">
            </div>
            <div class="col-6"></div>
            <div class="col-3 text-right">
            </div>
        </div>
        <div class="row">
            <div class="col-4 pt-3 pl-4">
                <div class="row textsize">
                    <div class="col-5 text-left blue textbold">
                        Description :
                    </div>
                    <div class="col-7 text-left">
                        {{ $MultipleData[0]['description'] }}
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
            <div class="col-4 text-right pt-5">
                <div style="display: -webkit-inline-box">
                </div>
                <div class="mr-5" style="display: -webkit-inline-box">
                    <h3><span style="color:rgb(1, 116, 177);"> DATE :</span></h3>
                    <h3 id="date"></h3>
                </div>
                <td>
                    <div class="visible-print text-center">
                        {!! QrCode::size(200)->generate(Request::url()) !!}
                    </div>
                </td>
            </div>
        </div>
        {{-- table --}}
        <table class="table table-striped table-bordered zero-configuration mt-5">
            <thead>
                <tr class="bgcolnew">
                    <th class="text-center" scope="col"> Id </th>
                    <th class="text-center" scope="col">Bag/Specimen</th>
                    <th class="text-center" scope="col">Grade</th>
                    <th class="text-center" scope="col">Weight</th>
                    <th class="text-center" scope="col">Size</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Data as $key => $data)
                    <tr>
                        <td class="text-center">{{ $data[0]['specimen/bag'] }}</td>
                        <td class="text-center">{{ $data[0]['specimen/bag'] }}</td>
                        <td class="text-center">{{ $data[0]['grade'] }}</td>
                        <td class="text-center">{{ $data[0]['weight'] }}</td>
                        <td class="text-center">{{ $data[0]['size'] }}</td>
                    </tr>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-1 pt-3"></div>
            <div class="col-6 pt-5 mt-6 text-center">
            </div>
        </div>
    </div>
</body>
<script>
    n = new Date();
    y = n.getFullYear();
    m = n.getMonth() + 1;
    d = n.getDate();
    document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
</script>
<script>
    window.print();
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

</html>
