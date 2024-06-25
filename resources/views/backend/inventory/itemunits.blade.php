@extends('backend.include.main')
@section('content')
    <div class="px-3">


        <div class="container-fluid">


            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Items Units</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb m-0 ">
                                <li class="breadcrumb-item btn btn-primary"><a href="{{ route('admin.items') }}">
                                    Back</a></li>
                              
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="page-title mb-0">Product Details</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-2">
                                        <form action="{{ route('admin.storegroup') }}" class="form-horizontal"
                                            role="form" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input autocomplete="off" type="hidden" value="{{ @$itemsdetail->id }}">
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Item Name</label>
                                                <div class="col-md-10">
                                                    <input autocomplete="off" type="text" class="form-control"
                                                        name="itemName" placeholder="Item Name"
                                                        value="{{ @$itemsdetail->itemName }}" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Vatable</label>
                                                <div class="col-md-10">
                                                    <input autocomplete="off" type="text" class="form-control"
                                                        name="vatable" placeholder="Vatable" value="No" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Item
                                                    Details</label>
                                                <div class="col-md-10">
                                                    <input autocomplete="off" type="text" class="form-control"
                                                        name="itemDetails" placeholder="Items Details"
                                                        value="{{ @$itemsdetail->itemDetails }}" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Group </label>
                                                <div class="col-md-10">
                                                    <input autocomplete="off" type="text" class="form-control"
                                                        data-toggle="modal" data-target="#myModalForGroup" id="groupName"
                                                        placeholder="Select Group"
                                                        value="{{ @$itemsgroupDetails->groupName }}" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Sub Group</label>
                                                <div class="col-md-10">
                                                    <input autocomplete="off" type="text" class="form-control"
                                                        data-toggle="modal" id="subGroupName"
                                                        data-target="#myModalForSubGroup" placeholder="Select Sub group"
                                                        value="{{ @$itemssubgroupdetails->subGroupName }}" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Units</label>
                                                <div class="col-md-10">
                                                    <input autocomplete="off" type="text" class="form-control"
                                                        data-toggle="modal" id="subGroupName"
                                                        data-target="#myModalForSubGroup" placeholder="Select Sub group"
                                                        value="{{ @$itemsdetail->units }}" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Company</label>
                                                <div class="col-md-10">
                                                    <input autocomplete="off" type="text" class="form-control"
                                                        data-toggle="modal" id="subGroupName"
                                                        data-target="#myModalForSubGroup" placeholder="Select Sub group"
                                                        value="{{ @$itemscompanydetails->companyName }}" readonly>
                                                </div>
                                            </div>


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
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="page-title mb-0">Items Rates</h4>

                            <div class="row">
                                <div class="col-12">
                                    <div class="p-2">
                                        <form action="{{ route('admin.storeitemssettingdetails') }}"
                                            class="form-horizontal" role="form" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input autocomplete="off" type="hidden" class="form-control"
                                                name="commonCode_id" value="{{ @$itemsdetail->id }}"
                                                placeholder="UnitsStatus">
                                            {{-- <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Buy rate</label>
                                                <div class="col-md-10">
                                                    <input autocomplete="off" type="number" class="form-control"
                                                        name="buyrate" placeholder="Buy Rate">
                                                </div>
                                            </div> --}}
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Price</label>
                                                <div class="col-md-10">
                                                    <input autocomplete="off" type="number" class="form-control"
                                                        name="sellrate" placeholder="Sell Rate">
                                                </div>
                                            </div>
                                            {{-- <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">
                                                    MRP</label>
                                                <div class="col-md-10">
                                                    <input autocomplete="off" type="number" class="form-control"
                                                        name="mrp" placeholder="MRP">
                                                </div>
                                            </div> --}}

                                            {{-- <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">
                                                    Discount</label>
                                                <div class="col-md-10">
                                                    <input autocomplete="off" type="number" class="form-control"
                                                        name="dis" placeholder="Discount" value="">
                                                </div>
                                            </div> --}}
                                            <button type="submit" class="btn btn-primary">Save</button>

                                        </form>

                                    </div>
                                </div>

                            </div>
                            <!-- end row -->
                        </div>
                    </div> <!-- end card -->
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="page-title mb-0">Items Addons</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-2">
                                        <form id="addonForm" class="form-horizontal" role="form" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input autocomplete="off" type="hidden" class="form-control"
                                                name="commonCode_id" value="{{ @$itemsdetail->id }}"
                                                placeholder="UnitsStatus">
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label">Select the Addon Category</label>
                                                <div class="col-md-10">
                                                    <select id="addonCategorySelect" name="company_id"
                                                        class="form-control">
                                                        @foreach ($addoncategory as $item)
                                                            <option value="{{ $item->id }}">{{ $item->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label">Select the Addon Item</label>
                                                <div class="col-md-10">
                                                    <select id="addonItemsSelect" name="addon_item_id"
                                                        class="form-control"></select>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-primary" id="addButton">Add</button>
                                            <button type="button" class="btn btn-success"
                                                id="submitFormButton">Submit</button>

                                            <div id="selectedAddonItems"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div> <!-- end card -->
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="page-title mb-0">Items Images</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-2">
                                        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                                        <form action="{{ route('admin.storeitemsimage') }}" class="form-horizontal"
                                            role="form" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input autocomplete="off" type="hidden" class="form-control"
                                                name="commonCode_id" value="{{ @$itemsdetail->id }}"
                                                placeholder="UnitsStatus">


                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">
                                                    Product Images</label>
                                                <div class="col-md-10">
                                                    <input autocomplete="off" type="file" class="form-control"
                                                        name="images[]" placeholder="Items Details" multiple>
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
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="page-title mb-0">Product Description</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-2">
                                        <form action="{{ route('admin.storeproductdetails') }}" class="form-horizontal"
                                            role="form" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input autocomplete="off" type="hidden" class="form-control"
                                                name="commonCode_id" value="{{ @$itemsdetail->id }}"
                                                placeholder="UnitsStatus">


                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">
                                                    Description Title</label>
                                                <div class="col-md-10">
                                                    <input autocomplete="off" type="text" class="form-control"
                                                        name="title" placeholder="Enter Product Details Title">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label"
                                                    for="example-textarea">Description</label>
                                                <div class="col-md-10">
                                                    <div id="snow-editor" style="height: 300px;"
                                                        class="ql-container ql-snow">
                                                        <div class="ql-editor" data-gramm="false" contenteditable="true">
                                                            <!-- Your Quill editor content will be here -->
                                                        </div>
                                                        <div class="ql-clipboard" contenteditable="true" tabindex="-1">
                                                        </div>
                                                        <div class="ql-tooltip ql-hidden">
                                                            <a class="ql-preview" rel="noopener noreferrer"
                                                                target="_blank" href="about:blank"></a>
                                                            <input type="text" data-formula="e=mc^2"
                                                                data-link="https://quilljs.com" data-video="Embed URL">
                                                            <a class="ql-action"></a><a class="ql-remove"></a>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="description" id="description-input">
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
                </div>
            </div>







        </div> <!-- container -->

    </div>
    <script>
        $(document).ready(function() {
            $('form').submit(function() {
                var quillContent = $('.ql-editor').html();
                $('#description-input').val(quillContent);
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var selectedItems = []; // Array to store selected items

            $('#addonCategorySelect').change(function() {
                var selectedCategoryId = $(this).val();
                var selectedCategoryText = $(this).find('option:selected').text();

                $.ajax({
                    url: '{{ route('admin.getaddonitems') }}',
                    method: 'GET',
                    data: {
                        category_id: selectedCategoryId
                    },
                    success: function(response) {
                        var $addonItemsSelect = $('#addonItemsSelect');
                        $addonItemsSelect.empty();

                        $.each(response, function(key, item) {
                            var displayText = item.title;
                            if (item.price !== null) {
                                displayText += ' - $' + item.price;
                            } else {
                                displayText += ' - $0';
                            }
                            $addonItemsSelect.append('<option value="' + item.id +
                                '" data-category="' + selectedCategoryText + '">' +
                                displayText + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching addon items:', error);
                    }
                });
            });

            $('#addButton').click(function() {
                var selectedOption = $('#addonItemsSelect').find('option:selected');
                var selectedItemId = selectedOption.val();
                var selectedItemText = selectedOption.text();
                var selectedCategory = selectedOption.data('category');
                var selectedPrice = selectedItemText.split('- $')[1];

                if (!selectedPrice) {
                    selectedPrice = "0";
                }

                // Push selected item to the array
                selectedItems.push({
                    id: selectedItemId,
                    title: selectedItemText,
                    category: selectedCategory,
                    price: selectedPrice
                });

                // Display selected items in the div
                displaySelectedItems();
            });

            // Function to display selected items in the div
            function displaySelectedItems() {
                var $selectedAddonItems = $('#selectedAddonItems');
                $selectedAddonItems.empty();

                // Loop through selected items array and display them in the div
                selectedItems.forEach(function(item, index) {
                    $selectedAddonItems.append('<div>' + item.title + ' (' + item.category + ')' +
                        ' - $<input type="text" class="price-input" value="' + item.price +
                        '" data-index="' + index + '"><button class="delete-btn" data-id="' + item.id +
                        '">Delete</button></div>');
                });
            }

            // Event delegation for dynamically added delete buttons
            $(document).on('click', '.delete-btn', function() {
                var itemId = $(this).data('id');
                // Remove the selected item from the array
                selectedItems = selectedItems.filter(function(item) {
                    return item.id != itemId;
                });
                // Display updated list of selected items
                displaySelectedItems();
            });

            // Event handler for form submission via AJAX
            $('#submitFormButton').click(function() {
                // Collect form data
                var formData = {
                    commonCode_id: $('input[name="commonCode_id"]').val(),
                    itemName: $('input[name="itemName"]').val(),
                    itemgroup_id: $('input[name="itemgroup_id"]').val(),
                    company_id: $('select[name="company_id"]').val(),
                    units: $('input[name="units"]').val(),
                    addonItems: selectedItems
                };

                // Send the data via AJAX
                $.ajax({
                    url: '{{ route('admin.storeaddonitems') }}',
                    method: 'POST',
                    data: JSON.stringify(formData),
                    contentType: 'application/json',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    success: function(response) {
                        alert('Data submitted successfully!');
                        // Clear selected items
                        selectedItems = [];

                        if ($('#addonItemsSelect option:selected').length === 1) {
                            $('#addonItemsSelect').val('');
                        }
                        // Update displayed selected items
                        displaySelectedItems();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error submitting form:', error);
                    }
                });
            });

            $(document).on('input', '.price-input', function() {
                var index = $(this).data('index');
                var newPrice = $(this).val();
                selectedItems[index].price = newPrice;
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('form').submit(function() {
                var quillContent = $('.ql-editor').html();
                $('#description-input').val(quillContent);
            });
        });
    </script>
@endsection
