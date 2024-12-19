@if (!empty($subcategories))
    @foreach ($subcategories as $subcategory)
        @if ($subcategory->parent_id == $parent_id) 
            <div class="form-check" style="margin-left: {{ $margin ? $margin : 20}}px;"> 
                <input class="form-check-input" type="checkbox" name="categories[]"
                    value="{{ $subcategory->id }}" id="category{{ $subcategory->id }}"
                    {{ in_array($subcategory->id, $selectedCategories) ? 'checked' : '' }}>
                <label class="form-check-label" for="category{{ $subcategory->id }}">
                    {{ $subcategory->name }}
                </label>
            </div>
            @include('admin.products.child_sub_category', [
                'subcategories' => $subcategory->children, 
                'parent_id' => $subcategory->id, 
                'selectedCategories' => $selectedCategories, 
                'margin' => 40
            ]) <!-- Recursive call -->
        @endif
    @endforeach
@endif