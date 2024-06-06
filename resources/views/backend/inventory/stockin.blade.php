@extends('backend.include.main')
@section('content')
    <?php
    $mytime = Carbon\Carbon::now();
    // echo  $mytime->toDateString("dd/MM/yyyy");
    ?>
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 260px;
            box-shadow: 0px 4px 18px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }
    </style>
    <div class="px-3">


        <div class="container-fluid">


            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Add Stock In</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb m-0 float-end">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">
                                        Item Stock</a></li>
                                <li class="breadcrumb-item active">Add</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-12">
                                    <div class="p-2">
                                        <form action="{{ route('admin.storedummies') }}" class="form-horizontal"
                                            role="form" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ @$dummydata[0]->id }}">
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Product</label>
                                                <div class="col-md-10">
                                                    <input type="hidden" class="form-control" name="itemId" id="itemId"
                                                        value="{{ @$dummydata[0]->item_id }} ">
                                                    <input type="text" name="groupName" class="form-control dropbtn"
                                                        placeholder="Enter Product Name"
                                                        onkeyup="selectProductsFromTable();" id="itemName"
                                                        placeholder="Product" value="{{ @$dummydata[0]->itemName }}">


                                                    <div id="dropdown-content" class="dropdown-content">
                                                        <table style="width: 100%" id="DataTable"
                                                            class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Product Name</th>
                                                                    <th>Unit</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Unit</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="unitEqualsTo" id="unitEqualsTo"
                                                        class="form-control" value="" placeholder="Enter Unit">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Quantity</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="quantity" id="simpleinput"
                                                        class="form-control" value="" placeholder="Enter Quantity">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Rate</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="Rate" id="simpleinput"
                                                        class="form-control" value="" placeholder="Enter Rate">
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </form>

                                    </div>
                                </div>

                            </div>
                            <!-- end row -->
                        </div>
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">


                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Item</th>
                                            <th>Unit</th>
                                            <th>Qty</th>
                                            <th>Bonus</th>
                                            <th>Rate</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($itemsdummy as $item)
                                            <tr>
                                                <th scope="row">{{ $item->id }}</th>
                                                <td>{{ $item->itemName }}</td>
                                                <td>{{ $item->units }}</td>

                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->bonus }}</td>
                                                <td>{{ $item->rate }}</td>


                                                <td>
                                                    <a href="/stockin/{{ $item->id }}" class="btn btn-info">Edit </a>
                                                    <a href="/stockindelete/{{ $item->id }}" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this item ?');">
                                                        Delete
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                </table>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="p-2">
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="simpleinput">Date</label>
                                        <div class="col-md-10">
                                            <input type="date" id="transactionDate" class="form-control"
                                                onchange="putDate();" name="date" value="<?php echo $mytime->toDateString('dd/MM/yyyy'); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="stockin/save/<?php echo $mytime->toDateString(); ?>" id="saveStockATag"> <button type="submit" class="btn btn-info">Save
                        </button></a>

                    </div>
                </div>


            </div>






        </div> <!-- container -->

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('form').submit(function() {
                var quillContent = $('.ql-editor').html();
                $('#description-input').val(quillContent);
            });
        });

        function selectProductsFromTable() {

            var searchKey = $("#itemName").val();
            // alert(searchKey);
            $.ajax({
                url: "{{ route('admin.searchforstockitem') }}",
                method: 'GET',
                data: {
                    query: searchKey,
                },
                dataType: 'json',
                success: function(data) {
                    $("#DataTable tbody").empty();
                    response = data;
                    for (var i = 0; i < response.length; i++) {
                        var str = '<tr><td><a onclick="putItemIntoTextField(' +
                            response[i].id + ',\'' + response[i].itemName + '\',\'' + response[i].altUnits +
                            '\',\'' + response[i].equals + '\')" href="#">' +
                            response[i].itemName + '</a></td> <td>' + response[i].altUnits + '</td></tr>';

                        $("#DataTable tbody").append(str);
                        // $("#dropdown-content").css("display") = 'block';
                        document.getElementById("dropdown-content").style.display = "block";
                    }
                }

            })
        }

        function putItemIntoTextField(itemId, itemName, units, itemUnitsEqual) {

            //alert(itemUnitsEqual);
            $("#itemName").val(itemName);
            $("#unitEqualsTo").val(itemUnitsEqual);

            $("#itemId").val(itemId);
            $("#itemUnits").val(units);
            document.getElementById("dropdown-content").style.display = "none";
        }
    </script>
@endsection