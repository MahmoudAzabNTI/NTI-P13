@extends('../../layouts/dashboard')
@section('title', "Product")
@section('content')
<!-- general form elements -->
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->
              @include('includes.flash-message')
              {{-- @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
              @endif --}}
              <div class="col-12"></div>
              <!-- form start -->
              <form action="{{route('dashboard.products.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Barcode</label>
                      <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Enter Barcode" value="{{ old('barcode') }}">
                      @error('barcode')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name Ar</label>
                      <input type="text" class="form-control" name="name_ar" id="name_ar" placeholder="Enter Name Ar" value="{{ old('name_en') }}">
                      @error('name_ar')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Name En</label>
                      <input type="text" class="form-control" name="name_en" id="name_en" placeholder="enter Name En" value="{{ old('name_ar') }}">
                      @error('name_en')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    </div>
                    </div>
                  </div>
                  
                  <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Cost</label>
                      <input type="number" class="form-control" name="cost" id="exampleInputEmail1" placeholder="Enter Cost" value="{{ old('cost') }}">
                      @error('cost')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Price</label>
                      <input type="number" class="form-control" name="price" id="exampleInputEmail1" placeholder="Enter Price" value="{{ old("price") }}">
                      @error('price')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Stock</label>
                      <input type="number" class="form-control" name="stock" id="stock" placeholder="enter Stock" value="{{ old('stock') }}">
                      @error('stock')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description Ar</label>
                      <textarea name="description_ar" id="" cols="30" rows="10" class="form-control">{{ old('description_ar') }}</textarea>
                      @error('description_ar')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-6">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Description En</label>
                      <textarea name="description_en" id="" cols="30" rows="10" class="form-control">{{ old('description_en') }}</textarea>
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
                     <option value="1">Active</option>
                     <option value="0">Not Active</option>
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
                      <img name="image" id="image" src="{{url('assets/images/products/$product->image')}}" alt="{{ old('name_en') }}" width="400" height="400">
                     </div>
                   </div>
                   <div class="col-6">
                   <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" id="iamge" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  @error('image')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                      </div>
                   </div>
                 </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="page" value="index" class="btn btn-primary">create</button>
                  <button type="submit" name="page" value="return" class="btn btn-success">create & return </button>
                </div>
              </form>
            </div>
@endsection
