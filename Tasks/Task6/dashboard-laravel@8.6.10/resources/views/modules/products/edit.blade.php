@extends('../../layouts/dashboard')
@section('title', "Product")
@section('content')
<!-- general form elements -->
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->
              @include('includes.flash-message');
              <!-- form start -->
              <form method="POST" action="{{ route('dashboard.products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Barcode</label>
                        <input type="text" class="form-control" name="barcode" id="exampleInputEmail1" placeholder="Enter Barcode" value="{{$product->barcode}}">
                        @error('barcode')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      </div>
                  <div class="col-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name En</label>
                    <input type="text" class="form-control" name="name_en" id="exampleInputEmail1" placeholder="Enter email" value="{{$product->name_en}}">
                    @error('name_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  </div>
                  <div class="col-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Name Ar</label>
                    <input type="text" class="form-control" name="name_ar" id="exampleInputPassword1" placeholder="Name ar" value="{{$product->name_ar}}">
                    @error('name_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cost</label>
                    <input type="number" class="form-control" name="cost" id="exampleInputEmail1" placeholder="Enter Cost" value="{{$product->cost}}">
                    @error('cost')
                       <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Price</label>
                      <input type="number" class="form-control" name="price" id="exampleInputEmail1" placeholder="Enter email" value="{{$product->price}}">
                      @error('price')
                         <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    </div>
                  <div class="col-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Quantity</label>
                    <input type="number" class="form-control" name="stock" id="exampleInputPassword1" placeholder="Quantity" value="{{$product->stock}}">
                    @error('stock')
                    <div class="alert alert-dnager">{{ $message }}</div>
                        
                    @enderror
                  </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Description Ar</label>
                        <textarea name="description_ar" id="" cols="30" rows="10" class="form-control">{{ $product->description_ar }}</textarea>
                        @error('description_ar')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description En</label>
                        <textarea name="description_en" id="" cols="30" rows="10" class="form-control">{{ $product->description_en }}</textarea>
                        @error('description_en')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    </div>
                   
                    </div>
                  <div class="row">
                  <div class="col-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                   <select name="status" id="status" class="form-control">
                     <option {{$product->status == 0 ? 'selected' : ''}} value="0">NOt avaliable</option>
                     <option {{$product->status == 1 ? 'selected': ''}} value="1">Avaliable</option>
                   </select>
                  </div>
                  </div>
                  <div class="col-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Brands</label>
                    <select name="brand_id" id="brand_id" class="form-control">
                      @foreach($brands as $brand)
                      <option value="{{$brand->id}}">{{$brand->name_en}}</option>
                      @endforeach
                    </select>
                  </div>

                  </div>
                  <div class="col-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">SubCategories</label>
                    <select name="subcategory_id" id="subcategory_id" class="form-control">
                      @foreach($subcategories as $subcategory)
                      <option value="{{$subcategory->id}}">{{$subcategory->name_en}}</option>
                      @endforeach
                    </select>
                  </div>
                  
                  </div>
                  </div>
                 
                 
                 <div class="row">
                   <div class="col-6">
                     .<div class="form-group">
                       <label for=""></label>
                      <img src="{{url('assets/images/products/', $product->image)}}" alt="{{ $product->name_en }}" width="400" height="400">
                     </div>
                   </div>
                   <div class="col-6">
                   <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                   </div>
                 </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="page" value="update" class="btn btn-primary">Update</button>
                  <button type="submit" name="page" value="return" class="btn btn-success">Update & Return</button>
                </div>
              </form>
            </div>
@endsection
