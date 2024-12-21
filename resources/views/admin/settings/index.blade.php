@extends('layouts.admin_layout')

@section('title','Settings')

@section('content')
<!--start main wrapper-->

<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Settings</li>
                    </ol>
                </nav>
            </div>
            {{-- <div class="ms-auto">
                <button class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-plus-lg me-2"></i>Add New</button>
            </div> --}}
        </div>
        <!--end breadcrumb-->

        <form action="{{ route('settings.update',$setting->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills nav-pills-warning mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="pill" href="#warning-pills-home" role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bi bi-house-door me-1 fs-6"></i>
                                    </div>
                                    <div class="tab-title">Genetal Settings</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#warning-pills-about" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bi bi-person me-1 fs-6"></i>
                                    </div>
                                    <div class="tab-title">Contacts</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#warning-pills-choose-us" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bi bi-headset me-1 fs-6'></i>
                                    </div>
                                    <div class="tab-title">Social Media</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="warning-pills-home" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="application_name" class="form-label">Application Name</label>
                                        <input type="text" name="application_name" class="form-control" value="{{ $setting->application_name }}" id="application_name" placeholder="Enter Application Name">
                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="site_title" class="form-label">Site Title</label>
                                        <input type="text" name="site_title" class="form-control" value="{{ $setting->site_title }}" id="site_title" placeholder="Enter Site Title">
                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="site_description" class="form-label">Site Description</label>
                                        <textarea name="site_description" class="form-control" id="site_description" placeholder="Enter Site Description">{{ $setting->site_description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="copyright" class="form-label">Copyright</label>
                                        <input type="text" name="copyright" class="form-control" value="{{ $setting->copyright }}" id="copyright" placeholder="Enter Copyright">
                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="{{ $setting->getFirstMediaUrl('logo') }}" data-holder-rendered="true" style="display: {{ is_have_image($setting->getFirstMediaUrl('logo')) }};">
                                        </div>
                                        <div class="mb-3">
                                            <label for="imgInp" class="form-label">Logo</label>
                                            <input class="form-control" name="logo" type="file" id="imgInp">
                                        </div> 
                                    </div>
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <img class="img-thumbnail rounded me-2" id="blahedit{{ $setting->id }}" alt="" width="200" src="{{ $setting->getFirstMediaUrl('favicon') }}" data-holder-rendered="true" style="display: {{ is_have_image($setting->getFirstMediaUrl('favicon')) }};">
                                        </div>
                                        <div class="mb-3">
                                            <label for="imgInpedit{{ $setting->id }}" class="form-label">Favicon (16x16)</label>
                                            <input class="form-control" name="favicon" type="file" id="imgInpedit{{ $setting->id }}">
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="warning-pills-about" role="tabpanel">
                                <div class="mb-3">
                                    <label for="primary_email" class="form-label">Email</label>
                                    <input type="text" name="primary_email" class="form-control" value="{{ $setting->primary_email }}" id="primary_email" placeholder="Enter Primary E-mail">
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="primary_phone" class="form-label">Whatsapp No</label>
                                    <input type="text" name="primary_phone" class="form-control" value="{{ $setting->primary_phone }}" id="primary_phone" placeholder="Enter Primary Phone">
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea name="address" class="form-control" id="address" placeholder="Enter Address">{{ $setting->address }}</textarea>
                                </div> --}}
                                <div class="mb-3">
                                    <label for="google_map" class="form-label">Google Map</label>
                                    <input type="text" name="google_map" class="form-control" value="{{ $setting->google_map }}" id="google_map" placeholder="Enter Google Map Link">
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                        </div>
                        <div class="tab-pane fade" id="warning-pills-choose-us" role="tabpanel">
                                <div class="mb-3">
                                    <label for="facebook_link" class="form-label">Facebook Link</label>
                                    <input type="text" name="facebook_link" class="form-control" value="{{ $setting->facebook_link }}" id="facebook_link" placeholder="Enter Facebook Link">
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="twitter_link" class="form-label">Twitter Link</label>
                                    <input type="text" name="twitter_link" class="form-control" value="{{ $setting->twitter_link }}" id="twitter_link" placeholder="Enter Twitter Link">
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="linked_in_link" class="form-label">LinkedIn Link</label>
                                    <input type="text" name="linked_in_link" class="form-control" value="{{ $setting->linked_in_link }}" id="linked_in_link" placeholder="Enter LinkedIn Link">
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div> --}}
                                {{-- <div class="mb-3">
                                    <label for="youtube_link" class="form-label">Youtube Link</label>
                                    <input type="text" name="youtube_link" class="form-control" value="{{ $setting->youtube_link }}" id="youtube_link" placeholder="Enter Youtube Link">
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div> --}}
                                <div class="mb-3">
                                    <label for="instagram_link" class="form-label">Google Link</label>
                                    <input type="text" name="instagram_link" class="form-control" value="{{ $setting->instagram_link }}" id="instagram_link" placeholder="Enter Google Link">
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="whatsapp_link" class="form-label">Whatsapp Link</label>
                                    <input type="text" name="whatsapp_link" class="form-control" value="{{ $setting->whatsapp_link }}" id="whatsapp_link" placeholder="Enter Whatsapp Link">
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div> --}}
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end main wrapper-->
</main>

@endsection

@section('script')

    <script>
        $('input[type="file"]').on('change', function() {
            const id = $(this).attr('id').replace('imgInpedit', '');
            var input = this;
            var preview = $('#blahedit' + id);

            if (input.files && input.files[0]) {
                var file = input.files[0];

                // Check if the selected file is an image
                if (file.type.startsWith('image/')) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        preview.attr('src', e.target.result).css('display', 'block');
                    }
                    reader.readAsDataURL(file);
                } else {
                    // If the file is not an image, hide the preview and optionally show an error message
                    preview.css('display', 'none');
                    alert('Please select a valid image file.');
                    // Clear the file input to avoid accidental submission of a non-image file
                    $(this).val('');
                }
            }
        });
    </script>

    <script>
        $('input[type="file"]').on('change', function() {
            const id = $(this).attr('id').replace('imgInpedit', '');
            var input = this;
            var preview = $('#blahedit' + id);

            if (input.files && input.files[0]) {
                var file = input.files[0];

                // Check if the selected file is an image
                if (file.type.startsWith('image/')) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        preview.attr('src', e.target.result).css('display', 'block');
                    }
                    reader.readAsDataURL(file);
                } else {
                    // If the file is not an image, hide the preview and optionally show an error message
                    preview.css('display', 'none');
                    alert('Please select a valid image file.');
                    // Clear the file input to avoid accidental submission of a non-image file
                    $(this).val('');
                }
            }
        });
    </script>

@endsection