@extends('backend.include.main')
@section('content')
    <div class="modal" id="myModalForSubGroup">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Search Subgroup</h5>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">

                    <div>
                        <input autocomplete="off" type="text" name="search" id="searchforsubgroup"
                            onkeyup="selectSubGroupFromTable(document.getElementById('itemgroup_id').value);"
                            class="form-control" placeholder="Search Subgroup">
                    </div>
                    <div>
                        <table style="width: 100%" id="DataTableForSubgroup" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Subgroup Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- This will be dynamically filled by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="myModalForGroup">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <div class="form-body">

                        <div style="">


                            <div data-example-id="simple-form-inline ">
                                <div class="form-group">
                                    <label for="Group Item" class="col-sm-2 control-label">Group</label>

                                    <div class="col-sm-9">
                                        <input autocomplete="off" type="text" name="search" id="search"
                                            value="{{ @$group->groupName }}" class="form-control" id=""
                                            placeholder="Search  Group ">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="itemgroup_id">Select Item Group:</label>
                                <select class="form-control" id="itemgroup_id"
                                    onchange="putGroupNameAndGroupIdInTextField(this.value, this.options[this.selectedIndex].text)">
                                    <option value="">Select Item Group</option>
                                    @foreach ($itemgroup as $group)
                                        <option value="{{ $group->id }}">{{ $group->groupName }}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>
                    </div>


                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-body">

                        <div>


                            <div data-example-id="simple-form-inline">
                                <table style="width: 100%" id="DataTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th> Group Name</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <div class="px-3">


        <div class="container-fluid">


            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Add Items</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb m-0 float-end">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">
                                        Item Group</a></li>
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
                                        <form action="{{ route('admin.storeitemssetting') }}" class="form-horizontal"
                                            role="form" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Item Name</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="itemName" id="simpleinput"
                                                        class="form-control" placeholder="Enter Item Name">
                                                    @error('itemName')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label">Vatable</label>
                                                <div class="col-md-10">
                                                    <select name="vatable"class="form-control">
                                                       
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                       
                                                    </select>
                                                  
                                                </div>
                                            </div> --}}
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Item
                                                    Details</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="itemDetails" id="simpleinput"
                                                        class="form-control" placeholder="Enter Item Details">
                                                    @error('itemDetails')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Group</label>
                                                <div class="col-md-10">
                                                    <input autocomplete="off" type="hidden" class="form-control"
                                                        data-bs-toggle="modal" data-bs-target="#myModalForGroup"
                                                        id="itemgroup_idval" placeholder="Select Group" name="itemgroup_id"
                                                        value="{{ @$itemsdetail->itemgroup_id }}" readonly>

                                                    <input autocomplete="off" type="text" class="form-control"
                                                        data-bs-toggle="modal" data-bs-target="#myModalForGroup"
                                                        id="groupName" placeholder="Select Group"
                                                        value="{{ @$itemsgroupDetails->groupName }}" readonly>
                                                    @error('itemgroup_id')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Sub Group</label>
                                                <div class="col-md-10">
                                                    <input autocomplete="off" type="hidden" class="form-control"
                                                        value="{{ @$itemsdetail->sub_groups_id }}" name="sub_groups_id"
                                                        id="sub_groups_id">
                                                    <input autocomplete="off" type="text" class="form-control"
                                                        value="{{ @$itemssubgroupdetails->subGroupName }}"
                                                        name="subgroupName" id="subGroupName" data-bs-toggle="modal"
                                                        data-bs-target="#myModalForSubGroup"
                                                        placeholder="Select Subgroup">
                                                </div>

                                            </div>
                                            {{-- <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label">Select the Brand</label>
                                                <div class="col-md-10">
                                                    <select name="company_id"class="form-control">
                                                        @foreach (@$brand as $item)
                                                            <option value="{{ @$item->id }}">
                                                                {{ @$item->companyName ?? '' }} </option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div> --}}

                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="example-fileinput">Item
                                                    Image</label>
                                                <div class="col-md-10">
                                                    <input type="file" name="thumbnail" class="form-control"
                                                        id="example-fileinput">
                                                    @error('thumbnail')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Unit</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="units" id="simpleinput"
                                                        class="form-control" placeholder="Enter Unit">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Delivery
                                                    Estimation Time</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="deliveryestimation" id="simpleinput"
                                                        class="form-control" placeholder="Enter Delivery Estimation">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label">Status</label>
                                                <div class="col-md-10">
                                                    <select name="status" class="form-control">
                                                        <option value="0">Pending</option>
                                                        <option value="1">Approved</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
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

                                            <th>Item Name</th>
                                            <th>Item Details</th>
                                            <th>P.Unit</th>
                                            <th>Thumbnail</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($itemsdetails as $item)
                                            <tr>

                                                <th>{{ $item->itemName }}</th>
                                                <th>{{ $item->itemDetails }}</th>
                                                <th>{{ $item->units }}</th>
                                                <td>
                                                    @if (!empty($item->thumbnail))
                                                        <img height="70px;" src="{{ $item->thumbnail }}" alt="">
                                                    @else
                                                        <img height="70px;" src="{{ asset('defaultimage.jpg') }}"
                                                            alt="">
                                                    @endif
                                                </td>
                                                <th>
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="flexSwitchCheck{{ $item->id }}"
                                                            onchange="toggleStatus('{{ $item->id }}')"
                                                            {{ $item->status ? 'checked' : '' }}
                                                            {{ $item->isNonChangeable ? 'disabled' : '' }}>
                                                        <input type="hidden" name="status{{ $item->id }}"
                                                            value="{{ $item->status ? '1' : '0' }}">
                                                    </div>
                                                </th>
                                                <td>
                                                    <a href="{{ route('admin.addunitdetails', ['id' => $item->id]) }}"
                                                        class="btn btn-info">Add Details</a>
                                                    <a href="{{ route('admin.viewitemdetails', ['id' => $item->id]) }}"
                                                        class="btn btn-info">View</a>
                                                    <a href="{{ route('admin.deleteitemdetails', ['id' => $item->id]) }}"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this item ?');">Delete</a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
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
    </script>
    <script>
        function selectSubGroupFromTable(groupId) {
            if (groupId == "") {
                alert("Select group first");
            } else {

                var searchKey = $("#searchforsubgroup").val();



                $.ajax({
                    url: "{{ route('admin.searchsubgroup') }}",
                    method: 'GET',
                    data: {
                        subgroupName: searchKey,
                        groupId: groupId
                    },
                    dataType: 'json',
                    success: function(data) {
                        $("#DataTableForSubgroup tbody").empty();
                        response = data;
                        // alert(JSON.parse(JSON.stringify(response)));
                        //console.log(response.length);


                        for (var i = 0; i < response.length; i++) {


                            var str = '<tr><td><a onclick="putSubGroupNameAndGroupIdInTextField(' +
                                response[i].id + ',\'' + response[i].subGroupName + '\')" href="#">' +
                                response[i].subGroupName + '</a></td></tr>';

                            $("#DataTableForSubgroup tbody").append(str);
                        }




                    }



                })
            }





        }

        function putSubGroupNameAndGroupIdInTextField(subgroupId, sName) {

            //  alert(subgroupName);
            $("#sub_groups_id").val(subgroupId);
            $("#subGroupName").val(sName);
            $("#myModalForSubGroup").modal('hide');
        }

        function putGroupNameAndGroupIdInTextField(groupId, groupName) {
            
            $("#itemgroup_idval").val(groupId);
            $("#groupName").val(groupName);
            $("#myModalForGroup").modal('hide');
        }


        $(document).ready(function() {
            function groupname(query = '') {

                $.ajax({
                    url: "{{ route('admin.searchgroup') }}",
                    method: 'GET',
                    data: {
                        query: query
                    },
                    dataType: 'json',
                    success: function(data) {
                        $("#DataTable tbody").empty();
                        response = data;
                        // alert(JSON.parse(JSON.stringify(response)));
                        //console.log(response.length);


                        for (var i = 0; i < response.length; i++) {


                            var str = '<tr><td><a onclick="putGroupNameAndGroupIdInTextField(' +
                                response[i].id + ',\'' + response[i].groupName + '\')" href="#">' +
                                response[i].groupName + '</a></td></tr>';

                            $("#DataTable tbody").append(str);
                        }




                    }



                })
            }
            $(document).on('keyup', '#search', function() {
                var query = $(this).val();
                groupname(query);

            });

        });
    </script>
    <script>
        function putGroupNameInSearchField(selectElement) {
            var groupName = selectElement.options[selectElement.selectedIndex].text;
            $('#search').val(groupName);
        }
    </script>
@endsection