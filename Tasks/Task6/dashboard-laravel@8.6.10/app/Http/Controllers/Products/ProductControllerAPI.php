<?php

namespace App\Http\Controllers\Products;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Traits\MediaTrait;
use Illuminate\Http\Request;

class ProductControllerAPI extends Controller
{
    use MediaTrait;
    //
    public function index()
    {
        # code...
        $products = Product::all();
        // return response()->json(compact('products'));
        return response()->json(['products' => $products]);
    }
    public function create()
    {
    //    $brands = Brand::all();
       $brands = Brand::select('name_ar', 'name_en')->orderBy('name_en')->get();
       $categories = Category::select('name_ar', 'name_en')->orderBy('name_en')->get();
       $subcategories = SubCategory::select('name_ar', 'name_en')->orderBy('name_en')->get();
       return response()->json(compact('brands', 'categories', 'subcategories'));
    }
    public function edit($id)
    {
        # code...
        $brands = Brand::select('name_ar', 'name_en')->orderBy('name_en')->get();
        $categories = Category::select('name_ar', 'name_en')->orderBy('name_en')->get();
        $subcategories = SubCategory::select('name_ar', 'name_en')->orderBy('name_en')->get();
        //$product = Product::find($id);
        $product = Product::findOrfail($id);
        return response()->json(compact('product', 'brands', 'categories', 'subcategories'));

    }
    public function store(ProductRequest $request)
    {
        #expect
        $data = $request->except('image');
        #upload image
        $data['image'] = $this->upload($request->image, "products");
        #insert in database
        Product::insert($data);
        #return 
        return response()->json(['status' => "true",'code' => 201, 'data' => $data, 'message' => "Product Created Successflly"]);
       
    }
    public function update(Request $request, $id)
    {
        #expect
        $data= $request->except(['image', '_method']);
        #check image found is exists upload new and delete old
        if($request->has('image')){
            $this->deleteImage("products", $id);
            $data['image'] = $this->uploadImage($request->image, "products");
        }
        #update in database
        Product::where('id', $id)->update($data);
        #return res
        return response()->json(['status' => true, 'code' => '200', 'data' => $data, 'message' => "Product Updated Successfully"]);
    }
    public function delete(Request $request, $id)
    {
        #chech id
        #delte iamge
        $this->deleteImage('products', $id);
        #delte from datsebase
        $data = Product::where('id', $id)->delete();
        #return 
       return response()->json(['success' => true, 'message' => "Product Deleted Successfully" ]);

    }
}
