@extends('backend.include.main')
@section('content')
    <?php
    $requestid = request()->route('id');
    $separatedid = explode('-', $requestid);
    
    ?>
    <div class="px-3">


        <div class="container-fluid">


            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Add Item Sub Category</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb m-0 float-end">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">
                                        Item Sub Category</a></li>
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
                                        <form action="{{ route('admin.storesubgroup') }}" class="form-horizontal"
                                            role="form" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Group Name</label>
                                                <div class="col-md-10">
                                                    <input type="text" onclick="clearGroupIdAndGroupName()"
                                                        name="search" id="search" value="<?php echo @$separatedid[1]; ?>"
                                                        class="form-control" placeholder="Search  Group ">
                                                </div>
                                            </div>

                                            <div class="form-body">

                                                <div style="margin-left: 17%">


                                                    <div data-example-id="simple-form-inline" id="displaySearch">
                                                        <table style="width: 57%" id="DataTable"
                                                            class="table table-striped">
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
                                            <input type="hidden" name="itemSubgroup_idEdit" id="itemSubgroup_idEdit"
                                                value="{{ @$subgroup->id }}" />

                                            <input type="hidden" name="itemgroup_id" id="itemgroup_id"
                                                value="{{ @$subgroup->itemgroup_id }}" />

                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Sub Group
                                                    Name</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="subGroupName"
                                                        value="{{ @$subgroup->subGroupName }}" class="form-control"
                                                        id="" placeholder="Enter Sub Group Item">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label">Status</label>
                                                <div class="col-md-10">
                                                    <select name="status" class="form-control">
                                                        <option value="0" {{ @$group->status == 0 ? 'selected' : '' }}>
                                                            Pending</option>
                                                        <option value="1" {{ @$group->status == 1 ? 'selected' : '' }}>
                                                            Approved</option>
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

                                            <th>Subgroup Name</th>
                                            <th>Item Group Name</th>
                                            <th>Item Group Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subgroupitems as $item)
                                            <tr>
                                                <td>{{ $item->itemgroup->groupName ?? '' }}</td>

                                                <td>{{ $item->subGroupName ?? '' }}</td>
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
                                                <th> <a href="{{ route('admin.editsubgroupname', $item->id) }}"
                                                        class="btn btn-info waves-effect waves-light">
                                                        <i class="mdi mdi-pen"></i>
                                                    </a>&nbsp; <a href="{{ route('admin.deletesubgroupname', $item->id) }}"
                                                        onclick=" return confirm('Are you sure you want to delete this item ?'); "
                                                        class="btn btn-danger waves-effect waves-light">
                                                        <i class="mdi mdi-close"></i>
                                                    </a></th>
                                            </tr>
                                        @endforeach

                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>




        </div> <!-- container -->

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        function deleteItem(itemId) {
            alert(itemId);

        }

        function clearGroupIdAndGroupName() {
            document.getElementById('search').value = '';
            document.getElementById('itemgroup_id').value = '';
        }

        // function searchSubGroupItems() {
        //     var searchKey = $("#searchData").val();

        //     $.ajax({
        //         url: "{{ url('searchdata') }}",
        //         method: 'GET',
        //         data: {
        //             query: searchKey
        //         },
        //         dataType: 'json',
        //         success: function(response) {
        //             $("#displaySearchItems tbody").empty();
        //             for (var i = 0; i < response.length; i++) {
        //                 var records = '<tr><th scope="row">' + response[i].id + '</th><td>' + response[i]
        //                     .item_group.groupName + '</td><td>' + response[i].subGroupName + '</td><td>' +
        //                     response[i].status + '</td><td><a href="/subgroup/' + response[i].id +
        //                     '" class="btn btn-info">Edit </a> <a href="/delete-subgroupitem/' + response[i].id +
        //                     '" class="btn btn-danger"> Delete </a> </td></tr>';
        //                 $("#displaySearchItems tbody").append(records);
        //             }
        //         }

        //     })
        // }




        function putGroupNameAndGroupIdInTextField(groupId, groupName) {

            $("#itemgroup_id").val(groupId);
            $("#search").val(groupName);
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
        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });
    </script>

    <script>
        function toggleStatus(itemId) {
            var checkbox = $('#flexSwitchCheck' + itemId);
            var status = checkbox.is(':checked') ? 1 : 0;

            $.ajax({
                url: '{{ route('admin.storesubgroup') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: itemId,
                    status: status
                },
                success: function(response) {

                    alert('Status updated successfully');
                },
                error: function(xhr) {

                    console.log('Error updating status');
                }
            });
        }
    </script>
@endsection
