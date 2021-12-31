<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Traits\MediaTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    #
    use MediaTrait;
    private $table = "products";
    public function index()
    {
        $products = DB::table($this->table)->select()->get();
        return view('modules.products.index', compact('products'));
    }
    public function create() 
    {
        $brands = DB::table('brands')->select()->get();
        $subcategories = DB::table('subcategories')->select()->get();
        return view('modules.products.create', compact('brands', 'subcategories'));

    }
    public function edit($id) 
    {
        $brands = DB::table('brands')->select()->get();
        $subcategories = DB::table('subcategories')->select()->get();
        $product = DB::table('products')->where('id', $id)->get()->first();
        return view ('modules.products.edit', compact('product', 'brands', 'subcategories'));
    }
    public function store(ProductRequest $request)
    {
        #expect
        $data = $request->except('_token', 'image', 'page');
       
        #upload image
        $data['image'] = $this->upload($request->image, 'products');
       
        # insert product
        if(is_null($data['stock'])) $data['stock'] = 1;
        DB::table('products')->insert($data);
        return $this->returnAccordingToRequest($request, "Product Crate Successfully");
       
    }
    public function update(ProductRequest $request, $id)
    {
        #expect
        $data = $request->except('_token','_method', 'image', 'page');
        # check image berfore upload image if exists go to delete old iamge
        if($request->has('image')){
            # delete old iamge
            $this->delete('products', $id);
            # upload new iamge           
            $data['image'] = $this->upload($request->image, 'products');
        }
        # update in database
        Db::table('products')->where('id', $id)->update($data);
        return $this->returnAccordingToRequest($request, "Product Updated Successfully");
    }
    public function destroy(Request $request, $id)
    {
        
        # delete photo
        $this->delete('products', $id);
        # delete product form table
        DB::table('products')->where('id', $request->id)->delete();
        # send message
        return redirect()->back()->with('success', "Product Deleted Successfully");

    }
    public function returnAccordingToRequest(Request $request, $message)
    {
        if($request->page == 'return'){
            return redirect()->back()->with('success', $message);
        }else{
            return redirect()->route('dashboard.products.index')->with('success',$message);
        }
    }
}
