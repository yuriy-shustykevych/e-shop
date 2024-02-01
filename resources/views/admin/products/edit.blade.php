@extends('layouts.admin ')

@section('content')

    <div class="row">
        <div class="col-md-12">

            @if(session('message'))
                <h5 class="alert alert-success mb-2">{{session('message')}}</h5>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Edit Product
                        <a href="{{url('admin/products')}}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                    </h3>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-warning">
                            @foreach($errors->all() as $error)
                                <div>{{$error}}</div>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-panel" href="#" role="tab" aria-controls="home-tab" aria-selected="true">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-panel" href="#" role="tab" aria-controls="seotag-tab" aria-selected="false">SEO Tags</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-panel" href="#" role="tab" aria-controls="details-tab" aria-selected="false">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-panel" href="#" role="tab" aria-controls="image-tab" aria-selected="false">Product Image</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane border p-3 fade show active" id="home-tab-panel" role="tabpanel" aria-labelledby="home-tab">
                                <div class="col-md-6 mb-3">
                                    <label>Category</label>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{ $category->id == $product->category_id ? "selected": "" }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="name" value="{{$product->name}}" class="form-control"/>
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label>Product Slug</label>
                                    <input type="text" name="slug" value="{{$product->slug}}" class="form-control"/>
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label>Brand</label>
                                    <input type="text" name="brand" value="{{$product->brand}}" class="form-control"/>
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label>Small Description (500 Words)</label>
                                    <textarea name="small_description" class="form-control" rows="4">{{ $product->small_description }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane border p-3 fade" id="seotag-tab-panel" role="tabpanel" aria-labelledby="seotag-tab">
                                <div class="col-md-6 mb-3 form-group">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" value="{{$product->meta_title}}" class="form-control"/>
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label>Mate Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4">{{$product->meta_keyword}}</textarea>
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="4">{{$product->meta_description}}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane border p-3 fade" id="details-tab-panel" role="tabpanel" aria-labelledby="details-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Original Price</label>
                                            <input type="number" name="original_price" value="{{$product->original_price}}" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Selling Price</label>
                                            <input type="number" name="selling_price" value="{{$product->selling_price}}" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Quantity</label>
                                            <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label>Trending</label>
                                            <input type="checkbox" name="trending" {{$product->trending == '1' ? 'checked': ''}} style="width: 20px; height: 20px;"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 form-group">
                                            <label>Status</label>
                                            <input type="checkbox" name="status" {{$product->status == '1' ? 'checked': ''}} style="width: 20px; height: 20px;"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane border p-3 fade" id="image-tab-panel" role="tabpanel" aria-labelledby="image-tab">
                                <div class="mb-3">
                                    <label>Upload Product Images</label>
                                    <input type="file" multiple name="image[]" class="form-control"/>
                                </div>
                                <div>
                                    @if($product->productImages)
                                        <div class="row">
                                            @foreach($product->productImages as $image)
                                                <div class="col-md-2">
                                                    <img src="{{ asset($image->image) }}" style="width: 80px; height: 80px;" class="me-4 border" alt="product photo"/>
                                                    <a href="{{ url( 'admin/product-image/'.$image->id.'/delete') }}" class="d-block">Remove</a>
                                                </div>
                                            @endforeach
                                        </div>



                                    @else
                                        <h5>No Image Added</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
