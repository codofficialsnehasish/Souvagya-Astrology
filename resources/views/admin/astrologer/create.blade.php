@extends('layouts.admin_layout')

    @section('title') Astrologer @endsection
    
    @section('content')

        <main class="main-wrapper">
            <div class="main-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Astrologer</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item">
                                        <a href="javascript:;">
                                            <i class="bx bx-home-alt"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add New Astrologer</li>
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
                            <a class="btn btn-primary px-4" href="{{ route('astrologer.index') }}"><i class="fadeIn animated bx bx-arrow-back"></i>Back</a>
                        </div>
                    </div>
                </div><!--end row-->

                <form class="needs-validation" action="{{ route('astrologer.store') }}" method="post" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card mt-4">
                                <div class="card-header text-center">Add Astrologer Details</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="Enter name" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a name.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email ID</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter email" id="email" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid email.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">Phone No.</label>
                                        <input type="number" name="mobile" id="phone" value="{{ old('mobile') }}" class="form-control" required placeholder="Enter phone number">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid phone number.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="pass">Password</label>
                                        <input type="password" name="password" id="pass" value="{{ old('password') }}" class="form-control" placeholder="Enter Password" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter password.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="aadhaar_number">Aadhaar Number</label>
                                        <input type="number" name="aadhaar_number" id="aadhaar_number" value="{{ old('aadhaar_number') }}" class="form-control" placeholder="Enter Aadhaar Number" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter aadhaar number.</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label" for="aadhaar_number">Aadhaar Front Side</label>
                                            <div class="mb-3">
                                                <img class="img-thumbnail rounded me-2" id="aadhar_front_blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
                                            </div>
                                            <div class="mb-0">
                                                <input class="form-control" name="aadhar_front" type="file" id="aadhar_front" required>
                                            </div> 
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="aadhaar_number">Aadhaar Back Side</label>
                                            <div class="mb-3">
                                                <img class="img-thumbnail rounded me-2" id="aadhar_back_blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
                                            </div>
                                            <div class="mb-0">
                                                <input class="form-control" name="aadhar_back" type="file" id="aadhar_back" required>
                                            </div> 
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="pan_card">Pan Card</label>
                                            <div class="mb-3">
                                                <img class="img-thumbnail rounded me-2" id="pan_card_blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
                                            </div>
                                            <div class="mb-0">
                                                <input class="form-control" name="pan_card" type="file" id="pan_card" required>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <h2 class="text-center">Certificate</h2>
                                        <table width="100%" cellpadding="5" cellspacing="5" id="table_repeter">
                                            <tr>
                                                <th width="20%">Certificate Name</th>
                                                <th width="10%">Certified Date</th>
                                                <th width="20%">Certificate Image</th>
                                                <th width="4%">&nbsp;</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" name="certificate_name[]" id="certificate_name" class="form-control"/>
                                                </td>
                                                <td>
                                                    <input type="date" name="certificate_date[]" id="certificate_date" class="form-control"/>
                                                </td>
                                                <td>
                                                    <input class="form-control" name="certificate_image[]" type="file" id="certificate_image">
                                                </td>
                                            </tr>
                                        </table>
                                        <div  id="more1"><a class="btn btn-success btn-sm float-end" href="javascript:;" onClick="showMore_edit('field_1');"><i class="fa fa-plus"></i>Add More</a></div>
                                        <p>&nbsp;</p>
                                        <input type="hidden" name="cont" id="cont" value="1" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="card mt-4">
                                    <div class="card-header text-center">Add Astrologer Image</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
                                        </div>
                                        <div class="mb-0">
                                            <input class="form-control" name="astrologer_image" type="file" id="imgInp">
                                        </div> 
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header text-center">Publish</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label mb-3 d-flex">Status</label>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadioInline1" name="status" class="form-check-input" value="1" checked>
                                                <label class="form-check-label" for="customRadioInline1">Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadioInline2" name="status" class="form-check-input" value="0">
                                                <label class="form-check-label" for="customRadioInline2">Inactive</label>
                                            </div>
                                        </div>
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" class="btn btn-grd-primary px-4">Submit</button>
                                            <button type="reset" class="btn btn-grd-info px-4">Reset</button>
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