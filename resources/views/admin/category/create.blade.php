@extends('layouts.admin_layout')

@section('title','Category')

@section('content')

<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Category</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="javascript:;">
                                    <i class="bx bx-home-alt"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Category</li>
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
                    <a class="btn btn-primary px-4" href="{{ route('category.index') }}"><i class="fadeIn animated bx bx-arrow-back"></i>Back</a>
                </div>
            </div>
        </div><!--end row-->

        <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row gy-4">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Category Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-12">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" value="{{ old('name')}}" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="col-12">
                                <label for="parent_id" class="form-label">Parent Category</label>
                                <select class="form-select" id="parent_id" name="parent_id">
                                    <option selected disabled value="">Choose...</option>
                                    @foreach($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @foreach ($category->children as $child)
                                            <option value="{{ $child->id }}" @if(old('parent_id') == $child->id) selected @endif>
                                                &nbsp;&nbsp;&nbsp;-- {{ $child->name }}
                                            </option>
                                            @foreach ($child->children as $childs)
                                                <option value="{{ $childs->id }}" @if(old('parent_id') == $childs->id) selected @endif>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- {{ $childs->name }}
                                                </option>
                                                @foreach ($childs->children as $subchilds)
                                                <option value="{{ $subchilds->id }}" @if(old('parent_id') == $subchilds->id) selected @endif>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- {{ $subchilds->name }}
                                                </option>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid category.
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="4" cols="50" placeholder="Enter a description...">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-0 mb-3">
                    <div class="card-header border-bottom bg-base py-16 px-24">
                        <h6 class="text-lg fw-semibold mb-0">Image Upload</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
                        </div>
                        <div class="mb-0">
                            <input class="form-control" name="image" type="file" id="imgInp">
                        </div> 
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Publish</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label mb-3 d-flex">Visibility</label>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="customRadioInline1" name="is_visible" class="form-check-input" value="1" checked>
                                <label class="form-check-label" for="customRadioInline1">Visible</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="customRadioInline2" name="is_visible" class="form-check-input" value="0">
                                <label class="form-check-label" for="customRadioInline2">Invisible</label>
                            </div>
                        </div>
                        <div class="md-3">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </form>
    </div>
</div>
</main>

@endsection

@section('script')
<script>
    // =============================== Upload Single Image js start here ================================================
    const fileInput = document.getElementById("upload-file");
    const imagePreview = document.getElementById("uploaded-img__preview");
    const uploadedImgContainer = document.querySelector(".uploaded-img");
    const removeButton = document.querySelector(".uploaded-img__remove");

    fileInput.addEventListener("change", (e) => {
        if (e.target.files.length) {
            const src = URL.createObjectURL(e.target.files[0]);
            imagePreview.src = src;
            uploadedImgContainer.classList.remove("d-none");
        }
    });
    removeButton.addEventListener("click", () => {
        imagePreview.src = "";
        uploadedImgContainer.classList.add("d-none");
        fileInput.value = "";
    });
    // =============================== Upload Single Image js End here ================================================

    // ================================================ Upload Multiple image js Start here ================================================
    const fileInputMultiple = document.getElementById("upload-file-multiple");
    const uploadedImgsContainer = document.querySelector(".uploaded-imgs-container");

    fileInputMultiple.addEventListener("change", (e) => {
        const files = e.target.files;

        Array.from(files).forEach(file => {
            const src = URL.createObjectURL(file);

            const imgContainer = document.createElement("div");
            imgContainer.classList.add("position-relative", "h-120-px", "w-120-px", "border", "input-form-light", "radius-8", "overflow-hidden", "border-dashed", "bg-neutral-50");

            const removeButton = document.createElement("button");
            removeButton.type = "button";
            removeButton.classList.add("uploaded-img__remove", "position-absolute", "top-0", "end-0", "z-1", "text-2xxl", "line-height-1", "me-8", "mt-8", "d-flex");
            removeButton.innerHTML = "<iconify-icon icon=\'radix-icons:cross-2\' class=\'text-xl text-danger-600\'></iconify-icon>";

            const imagePreview = document.createElement("img");
            imagePreview.classList.add("w-100", "h-100", "object-fit-cover");
            imagePreview.src = src;

            imgContainer.appendChild(removeButton);
            imgContainer.appendChild(imagePreview);
            uploadedImgsContainer.appendChild(imgContainer);

            removeButton.addEventListener("click", () => {
                URL.revokeObjectURL(src);
                imgContainer.remove();
            });
        });

        // Clear the file input so the same file(s) can be uploaded again if needed
        fileInputMultiple.value = "";
    });
    // ================================================ Upload Multiple image js End here  ================================================

    // ================================================ Upload image & show it\'s name js start  ================================================
    document.getElementById("file-upload-name").addEventListener("change", function(event) {
        var fileInput = event.target;
        var fileList = fileInput.files;
        var ul = document.getElementById("uploaded-img-names");

        // Add show-uploaded-img-name class to the ul element if not already added
        ul.classList.add("show-uploaded-img-name");

        // Append each uploaded file name as a list item with Font Awesome and Iconify icons
        for (var i = 0; i < fileList.length; i++) {
            var li = document.createElement("li");
            li.classList.add("uploaded-image-name-list", "text-primary-600", "fw-semibold", "d-flex", "align-items-center", "gap-2");

            // Create the Link Iconify icon element
            var iconifyIcon = document.createElement("iconify-icon");
            iconifyIcon.setAttribute("icon", "ph:link-break-light");
            iconifyIcon.classList.add("text-xl", "text-secondary-light");

            // Create the Cross Iconify icon element
            var crossIconifyIcon = document.createElement("iconify-icon");
            crossIconifyIcon.setAttribute("icon", "radix-icons:cross-2");
            crossIconifyIcon.classList.add("remove-image", "text-xl", "text-secondary-light", "text-hover-danger-600");

            // Add event listener to remove the image on click
            crossIconifyIcon.addEventListener("click", (function(liToRemove) {
                return function() {
                    ul.removeChild(liToRemove); // Remove the corresponding list item
                };
            })(li)); // Pass the current list item as a parameter to the closure

            // Append both icons to the list item
            li.appendChild(iconifyIcon);

            // Append the file name text to the list item
            li.appendChild(document.createTextNode(" " + fileList[i].name));

            li.appendChild(crossIconifyIcon);

            // Append the list item to the unordered list
            ul.appendChild(li);
        }
    });
    // ================================================ Upload image & show it\'s name js end ================================================
</script>
@endsection