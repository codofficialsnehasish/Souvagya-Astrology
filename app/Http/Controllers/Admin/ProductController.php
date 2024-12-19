<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $proucts = Product::all();
        return view('admin.products.index',compact('proucts'));
    }

    public function basic_info_create(){
        $categorys = Category::where('is_visible',1)->where('parent_id',null)->get();
        return view('admin.products.basic_info',compact('categorys'));
    }

    public function basic_info_process(Request $request){
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_type' => 'nullable|in:simple,attribute',
        ]);
        $product = new Product();
        $product->name = $request->product_name;
        $product->product_type = $request->product_type ?? 'simple';
        $product->slug = createSlug($request->product_name, Product::class);
        $product->sort_description = $request->sort_description;
        $product->long_description = $request->long_description;
        $product->price = 0.00;
        $product->product_price = 0.00;
        $product->discount_rate = 0;
        $product->discount_price = 0.00;
        $product->gst_rate = 0;
        $product->gst_amount = 0.00;
        $product->total_price = 0.00;
        $product->is_special = $request->is_special;
        $product->is_visible = $request->is_visible;
        $res = $product->save();

        if ($request->has('categories')) {  
            $product->categories()->sync($request->categories);
        }

        if($res){
            return redirect(route('products.price-edit',$product->id))->with(['success'=>'Basic Information Added Successfully']);
        }else{
            return redirect()->back()->with(['error'=>'Some error occurs!']);
        }
    }

    public function basic_info_edit(Request $request){
        $categorys = Category::where('is_visible',1)->where('parent_id',null)->get();
        $product = Product::find($request->id);
        $selectedCategories = $product->categories->pluck('id')->toArray();
        return view('admin.products.basic_info_edit',compact('categorys','product','selectedCategories'));
    }

    public function basic_info_edit_process(Request $request){
        $product = Product::find($request->product_id);
        if($product->name != $request->product_name){
            $product->name = $request->product_name;
            $product->slug = createSlug($request->product_name, Product::class);
        }
        // $product->product_type = $request->product_type;
        $product->sort_description = $request->sort_description;
        $product->long_description = $request->long_description;
        $product->veg = $request->veg_non_veg;
        $product->is_available = $request->is_available;
        $product->is_special = $request->is_special;
        $product->is_visible = $request->is_visible;
        $res = $product->update();

        if ($request->has('categories')) {  
            $product->categories()->sync($request->categories);
        }

        if($res){
            return redirect(route('products.price-edit',$product->id))->with(['success'=>'Basic Information Added Successfully']);
        }else{
            return redirect()->back()->with(['error'=>'Some error occurs!']);
        }
    }

    public function price_edit(Request $request){
        if(request()->segment(4) == ''){
			return redirect(route('products.basic-info-create'))->with(['error'=>'Please Fill Basic Information']);
		}
        $product = Product::find($request->id);
        return view('admin.products.price_edit',compact('product'));
    }

    public function price_edit_process(Request $request){
        $product = Product::find($request->product_id);
        if($product->product_type == 'simple'){
            $product->price = $request->product_price;
            $product->discount_rate = $request->discount_rate;
            // $product->discounted_price = $request->product_price - (($request->discount_rate / 100) * $request->product_price);
            $product->gst_rate = $request->gst_rate;
            $product->total_price = $request->total_price;
            // $product->gst_amount = ($request->gst_rate / 100) * $product->discounted_price;
            $product->discount_price = ($request->discount_rate / 100) * $request->product_price;
            $gstRate = $request->gst_rate/100;
            $product->gst_amount = ($request->total_price * $gstRate) / (1 + $gstRate);
            $product->product_price = $request->total_price - $product->gst_amount;
            $res = $product->update();
            if($res){
                return redirect(route('products.product-images-edit',$product->id))->with(['success'=>'Price Details Updated Successfully']);
            }else{
                return redirect()->back()->with(['error'=>'Some error occurs!']);
            }
        }else{
            return redirect(route('products.product-images-edit',$product->id))->with(['success'=>'Price Details Updated Successfully']);
        }
    }

    public function product_images_edit(Request $request){
        if(request()->segment(4) == ''){
			return redirect(route('products.basic-info-create'))->with('error','Please Fill Basic Information');
		}
        $product = Product::find($request->id);
        $product_images = $product->getMedia('products-media');
        return view('admin.products.product_images_edit',compact('product','product_images'));
    }

    public function product_images_process(Request $request){
        return redirect(route('product.index'))->with(['success'=>'Updated Successfully']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function productGalleryStore(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ], [
            'file.required' => 'Please upload an image file.',
            'file.image' => 'The file must be an image.',
            'file.mimes' => 'The file must be a type of: jpeg, png, jpg, gif, svg, webp.',
            'file.max' => 'The file size must not exceed 2MB.',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('file')) {

            $file = $request->file('file');

            // Retrieve the Service model
            $product = Product::findOrFail($request->product_id);

            // Add the file to Spatie Media Library
            $media = $product
                ->addMedia($file)
                ->toMediaCollection('products-media');

            // Associate the custom file ID
            $media->setCustomProperty('file_id', $request->file_id);
            $media->save();

            return response()->json(['success' => 'File uploaded successfully!']);
        }
        return response()->json(['error' => 'File not uploaded!'], 500);
    
        // return response()->json(['paths' => $filepath, 'message' => 'Images uploaded successfully']);

    }
    /**
     * Store a newly created resource in storage.
     */
    public function productTempImages(Request $request)
    {
        $file_id = $request->file_id;
		$product_id = $request->product_id;

        $product = Product::find($product_id);
        $mediaItems = $product->getMedia('products-media');
        $media = $mediaItems->firstWhere('custom_properties.file_id', $file_id);
        
        if ($media) {
            $html = '<img src="' . $media->getUrl() . '" alt="">' .
                '<a href="javascript:void(0)" class="btn-img-delete btn-delete-product-img" data-file-id="' . $media->getCustomProperty('file_id') . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item"><i class="far fa-trash-alt"></i></a>';
    
            // Check if this is the main image
            if ($media->getCustomProperty('is_main', false)) {
                $html .= '<a href="javascript:void(0)" class="float-start btn btn-success btn-sm waves-effect btn-set-image-main" style="padding: 0 4px;" data-file-id="' . $media->getCustomProperty('file_id') . '">Main</a>';
            } else {
                $html .= '<a href="javascript:void(0)" class="float-start btn btn-secondary btn-sm waves-effect btn-set-image-main" style="padding: 0 4px;" data-file-id="' . $media->getCustomProperty('file_id') . '">Main</a>';
            }
    
            return response()->json(['html' => $html]);
        }
    
        return response()->json(['error' => 'Media not found.'], 404);
    }

    public function delete_product_media(Request $request){
        $file_id=$request->file_id;
        $product_id=$request->product_id;
        $product = Product::findOrFail($product_id);
        $mediaItem = $product->getMedia('products-media')->firstWhere('custom_properties.file_id', $file_id);

        // Check if media exists
        if ($mediaItem) {
            $mediaItem->delete(); // Delete the media
            return response()->json('Media deleted successfully!');
        }
        return response()->json('Media Not Found');
    }

    public function set_main_product_image(Request $request){
        $file_id = $request->file_id;
        $product_id = $request->product_id;

        // Fetch the product
        $product = Product::findOrFail($product_id);

        // Reset 'is_main' for all images in the gallery
        $mediaItems = $product->getMedia('products-media');
        foreach ($mediaItems as $media) {
            $media->setCustomProperty('is_main', false)->save();
        }

        // Set 'is_main' for the selected file
        $mainImage = $mediaItems->firstWhere('custom_properties.file_id', $file_id);
        if ($mainImage) {
            $mainImage->setCustomProperty('is_main', true)->save();
        }

        // Generate HTML for all media items
        $html = '';
        foreach ($mediaItems as $media) {
            $html .= '<li class="media" id="uploaderFile' . $media->getCustomProperty('file_id') . '">
                        <img src="' . $media->getUrl() . '" alt="">' .
                        '<a href="javascript:void(0)" class="btn-img-delete btn-delete-product-img" data-file-id="' . $media->getCustomProperty('file_id') . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item"><i class="far fa-trash-alt"></i></a>';
            if ($media->getCustomProperty('is_main')) {
                $html .= '<a href="javascript:void(0)" class="float-start btn btn-success btn-sm waves-effect btn-set-image-main" style="padding-bottom: 0px;padding-top: 0px;padding-right: 4px;padding-left: 4px;" data-file-id="' . $media->getCustomProperty('file_id') . '">Main</a>';
            } else {
                $html .= '<a href="javascript:void(0)" class="float-start btn btn-secondary btn-sm waves-effect btn-set-image-main" style="padding-bottom: 0px;padding-top: 0px;padding-right: 4px;padding-left: 4px;" data-file-id="' . $media->getCustomProperty('file_id') . '">Main</a>';
            }
            $html .= '</li>';
        }

        return response()->json(['html' => $html]);
    }

    public function product_addons_edit(Request $request){
        if(request()->segment(4) == ''){
			return redirect(route('products.basic-info-create'))->with('error','Please Fill Basic Information');
		}
        $all_products = Product::where('is_visible',1)->get();
        $product = Product::find($request->id);
        return view('admin.products.product_addons_edit',compact('all_products','product'));
    }

    public function product_addons_update(Request $request){
        $product = Product::find($request->product_id);
        if ($request->has('addons')) {  
            $product->addon_products()->sync($request->addons);
        }

        if ($request->has('complamentary')) {  
            $product->complamentary_products()->sync($request->complamentary);
        }

        // products.product-addons-edit
        return redirect()->back()->with('success','Updated Successfully');
    }

    public function destroy(string $id){
        $product = Product::findOrFail($id);
        if($product){
            $res = $product->delete();
            if($res){
                return back()->with('success','Deleted Successfully');
            }else{
                return back()->with('error','Not Deleted');
            }
        }else{
            return back()->with('error','Not Found');
        }
    }
}
