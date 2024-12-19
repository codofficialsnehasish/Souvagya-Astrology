<ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
    <li class="nav-item">
        <a class="nav-link {{ request()->segment(3) == 'basic-info-edit' ? 'active' : '' }}" href="{{ route('products.basic-info-edit',request()->segment(4)) }}" role="tab">
            <span class="d-none d-md-block">Basic Information</span>
            <span class="d-block d-md-none">
                <i class="mdi mdi-home-variant h5"></i>
            </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->segment(3) == 'price-edit' ? 'active' : '' }}"  href="{{ route('products.price-edit',request()->segment(4)) }}" role="tab">
            <span class="d-none d-md-block">Price Details</span>
            <span class="d-block d-md-none">
                <i class="mdi mdi-account h5"></i>
            </span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->segment(3) == 'product-images-edit' ? 'active' : '' }}" href="{{ route('products.product-images-edit',request()->segment(4)) }}" role="tab">
            <span class="d-none d-md-block">Product Images</span>
            <span class="d-block d-md-none">
                <i class="mdi mdi-cog h5"></i>
            </span>
        </a>
    </li>
</ul>