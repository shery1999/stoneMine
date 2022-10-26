@extends('layouts.admin')
@section('titles', 'Processing')
@section('content')

    <div class="container-fluid mt-3">

        <form class="form-valide" action="/processing" method="post" onsubmit="this.submit(); this.reset(); return false;">

            @csrf
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <h4 class="card-title"></h4>
                        <h4 class="card-title">Workshop</h4>
                        <div class="basic-form">
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2">Options</label>
                                    <select required name="workshop" class="custom-select mr-sm-2"
                                        id="inlineFormCustomSelect">
                                        <option value="" selected="selected">Choose...</option>
                                        @foreach ($workshop_data as $key => $item)
                                            <option value='{{ $item['id'] }}'>{{ $item['workshop'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title"></h4>
                        <h4 class="card-title"></h4>
                        <h4 class="card-title">Bag ID</h4>
                        <div class="basic-form">
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <label class="mr-sm-2">Options</label>
                                    <select required placeholder="Enter " id="input" name="bag_id"
                                        class="custom-select mr-sm-2">
                                        <option value="" id="selected" selected="selected">Choose...</option>
                                        @foreach ($first_storage_data as $key => $item)
                                            <option id="{{ $item['unprocessed_grading_id'] }}|{{ $item['id'] }}"
                                                value='{{ $item['unprocessed_grading_id'] }}|{{ $item['id'] }}'>
                                                {{ $item['id'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" onclick="addmember();" class="btn btn-block btn-success">Add
                                        New</button>
                                    <input type="hidden" id="bag_id" name="bag_ids" value="">
                                </div>
                            </div>
                            <div class="form-row align-items-center">
                                <table id="myTable" class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Details</h4>
                        <p class="text-muted m-b-15 f-s-12"><code></code></p>
                        <div class="basic-form">
                            <h4 class="card-title"></h4>
                            <div class="form-group">
                                <textarea name="description" class="form-control h-150px" rows="6" placeholder="Description" id="comment"></textarea>
                            </div>
                            <h4 class="card-title"></h4>
                        </div>
                    </div>
                </div>
            </div>
            <input type="text" id="refreshcheck" value="no">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Submit</h4>
                            <div class="button-icon">
                                <button id="btnsubmit" onclick="submitForm()" type="submit"
                                    class="btn mb-1 btn-success">Submit <span class="btn-icon-right"><i
                                            class="fa fa-check"></i></span>
                                </button>
                            </div>
                            <button onclick="submitForm()">formtesting</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

<script>
    var value;
    var array = [];
    var i = 1;

    function addmember() {

        console.log(document.getElementById("input").value);
        value = document.getElementById("input").value;
        if (!value == '') {

            var myarr = value.split("|");
            console.log(myarr)
            var table = document.getElementById("myTable");
            var row = table.insertRow();
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = i;
            cell2.innerHTML = myarr[0];
            i++;
            array.push(value);
            console.log(array);
            document.getElementById('bag_id').value = array;

            document.getElementById(value).hidden = true;
            document.getElementById(value).value = "";
            document.getElementById(value).innerHTML = "";
            console.log(value)
            if (value = "") {
                console.log('Please select a value')
            }
            var z = getInputValue();
        }


    }
</script>
