@extends('layouts.admin_layout')

@section('title','Products')

@section('content') 

<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Products</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="javascript:;">
                                    <i class="bx bx-home-alt"></i>
                                </a>
                            </li>
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
            {{-- <div class="col-auto">
                <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                    <a class="btn btn-primary px-4" href="{{ route('category.index') }}"><i class="fadeIn animated bx bx-arrow-back"></i>Back</a>
                </div>
            </div> --}}
        </div><!--end row-->

        <form action="{{ route('products.add-basic-edit-info') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            @include('admin.products.nav-tabs-edit')
                            <input type="hidden" name="product_id" value="{{ request()->segment(4) }}">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active p-3" id="basicinfo" role="tabpanel">
                                    <div class="card-body">
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Name</label>
                                            <div>
                                                <input data-parsley-type="text" value="{{ $product->name }}" type="text" class="form-control" required placeholder="Enter Product Title" name="product_name">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Sort Description</label>
                                            <textarea class="editor" name="sort_description" id="">{{ $product->sort_description }}</textarea>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label">Long Description</label>
                                            <textarea class="editor" name="long_description" id="">{{ $product->long_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-light">
                            <div class="d-flex flex-wrap">
                                <span class="me-2">Category</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="category-tree" style="max-height: 300px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
                                @if (!empty($categorys))
                                    @foreach ($categorys as $category)
                                        <!-- Only display top-level categories -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" id="category{{ $category->id }}" {{ isset($selectedCategories) && in_array($category->id, $selectedCategories) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="category{{ $category->id }}"> {{ $category->name }} </label>
                                        </div>
                                        @include('admin.products.subcategory', [
                                            'subcategories' => $category->children,
                                            'parent_id' => $category->id,
                                            'margin' => 20,
                                            'selectedCategories' => isset($selectedCategories) ? $selectedCategories : [],
                                        ])
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header bg-primary text-light">
                            Publish
                        </div>
                        <div class="card-body">
                            {{-- <div class="mb-3">
                                <label class="form-label mb-3 d-flex">Product Type</label>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="customRadioInline1" name="product_type" class="form-check-input" value="simple" {{ check_uncheck($product->product_type,'simple') }}>
                                    <label class="form-check-label" for="customRadioInline1">Simple</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="customRadioInline2" name="product_type" class="form-check-input" value="attribute" {{ check_uncheck($product->product_type,'attribute') }}>
                                    <label class="form-check-label" for="customRadioInline2">Attribute</label>
                                </div>
                            </div> --}}
                            <div class="mb-3">
                                <label class="form-label mb-3 d-flex">Special Product</label>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="special" name="is_special" class="form-check-input" value="1" {{ check_uncheck($product->is_special,1) }}>
                                    <label class="form-check-label" for="special">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="notspecial" name="is_special" class="form-check-input" value="0" {{ check_uncheck($product->is_special,0) }}>
                                    <label class="form-check-label" for="notspecial">No</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label mb-3 d-flex">Visiblity</label>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="show" name="is_visible" class="form-check-input" value="1" {{ check_uncheck($product->is_visible,1) }}>
                                    <label class="form-check-label" for="show">Show</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="hide" name="is_visible" class="form-check-input" value="0" {{ check_uncheck($product->is_visible,0) }}>
                                    <label class="form-check-label" for="hide">Hide</label>
                                </div>
                            </div>
                            <div class="mb-0">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                        Save & Next
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect">
                                        Cancel
                                    </button>
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