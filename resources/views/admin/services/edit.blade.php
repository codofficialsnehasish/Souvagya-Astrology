@extends('layouts.admin_layout')

    @section('title') Services @endsection
    
    @section('content')

        <main class="main-wrapper">
            <div class="main-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Services</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item">
                                        <a href="javascript:;">
                                            <i class="bx bx-home-alt"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Services</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                <!--end breadcrumb-->

                <div class="row g-3">
                    <div class="col-auto">
                    </div>
                    <div class="col-auto flex-grow-1 overflow-auto">
                    </div>
                    <div class="col-auto">
                        <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                            <a class="btn btn-primary px-4" href="{{ route('services.index') }}"><i class="fadeIn animated bx bx-arrow-back"></i>Back</a>
                        </div>
                    </div>
                </div><!--end row-->

                <form class="needs-validation" action="{{ route('services.update',$service->id) }}" method="post" novalidate enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card mt-4">
                                <div class="card-header text-center">Edit Services Details</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" class="form-control" value="{{ $service->name }}" name="name" id="name" placeholder="Enter name" required>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter a name.</div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="price">Price</label>
                                            <input type="number" step="0.01" class="form-control" value="{{ $service->price }}" name="price" id="price" placeholder="Enter price" required>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter a name.</div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="duration_hours">Service Duration</label>
                                        @php
                                            $hours = intdiv($service->duration, 60); // Calculate hours
                                            $minutes = $service->duration % 60;     // Calculate remaining minutes
                                        @endphp
                                        <div class="d-flex align-items-center">
                                            <input type="number" name="duration_hours" value="{{ $hours }}" id="duration_hours" class="form-control me-2" placeholder="Hours" min="0">
                                            <input type="number" name="duration_minutes" value="{{ $minutes }}" id="duration_minutes" class="form-control" placeholder="Minutes" min="0" max="59">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="sort_description">Sort Description</label>
                                        <textarea name="sort_description" class="form-control" placeholder="Enter Sort Description" id="sort_description">{{ $service->sort_description }}</textarea>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid email.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="long_description">Long Description</label>
                                        <textarea name="long_description" class="form-control" placeholder="Enter Sort Description" id="sort_description">{{ $service->sort_description }}</textarea>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid email.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="card mt-4">
                                    <div class="card-header text-center">Edit Services Image</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="{{ asset($service->image) }}" data-holder-rendered="true" style="display: {{ is_have_image($service->image) }};">
                                        </div>
                                        <div class="mb-0">
                                            <input class="form-control" name="image" type="file" id="imgInp">
                                        </div> 
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header text-center">Publish</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label mb-3 d-flex">Status</label>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadioInline1" name="is_active" class="form-check-input" value="1" {{ check_uncheck($service->is_active,1) }}>
                                                <label class="form-check-label" for="customRadioInline1">Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadioInline2" name="is_active" class="form-check-input" value="0" {{ check_uncheck($service->is_active,0) }}>
                                                <label class="form-check-label" for="customRadioInline2">Inactive</label>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" class="btn text-light btn-grd-primary px-4">Submit</button>
                                            <button type="reset" class="btn text-light btn-grd-info px-4">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>

    @endsection

    @section('script')
    <script>
        $('#aadhar_front').on('change', function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#aadhar_front_blah').attr('src', e.target.result).css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
        $('#aadhar_back').on('change', function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#aadhar_back_blah').attr('src', e.target.result).css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
        $('#pan_card').on('change', function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#pan_card_blah').attr('src', e.target.result).css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        });

    </script>
    <script>
		function showMore_edit(id){
            var idd = id.split("_");
            var idty = parseInt(idd[1]);
            idty = idty + 1;
            var table = document.getElementById("table_repeter");
            console.log(table);
            var rowCount = table.rows.length;
            
            var row = table.insertRow(rowCount);
            var cell0 = row.insertCell(0);
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
            console.log(cell0,cell1, cell2, cell3);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            document.getElementById("cont").value = idty;
               
				
			cell1.innerHTML = '<input type="text" name="certificate_name[]" id="certificate_name" class="form-control"/>';
				
			cell2.innerHTML = '<input type="date" name="certificate_date[]" id="certificate_date" class="form-control"/>';

            cell3.innerHTML = '<input class="form-control" name="certificate_image[]" type="file" id="certificate_image">';
            
            cell4.innerHTML = "<a  href=\"javascript:;\" class=\"btn btn-danger btn-sm\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Remove this Item\" onClick=\"deleteRow(this)\"><i class=\"fadeIn animated bx bx-trash\"></i></a>";
                 

				  
			document.getElementById("more1").innerHTML = "<a class=\"btn btn-success btn-sm float-end\" href=\"javascript:;\" onClick=\"showMore_edit('field_" + idty + "');\"><i class=\"fa fa-plus\"></i>Add More</a>";
                
                
        }

        function deleteRow(btn) {
            if (confirm("Are You Sure?") == true) {
                var row = btn.parentNode.parentNode;
                row.parentNode.removeChild(row);
            } else { }
		}
    </script>
    @endsection