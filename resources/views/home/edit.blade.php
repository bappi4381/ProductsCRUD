@extends('layouts.app-master')
@section('content')
<div class="row mt-4">
    <div class="col mx-auto">
        <div class="card" style="width: 38rem;">
            <div class="card-body">
                    <h4 class="card-title mb-4">Update Product Form</h4>
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    <form action="{{route('product.update',['id' => $products->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Product title</label>
                                <input type="text"  name="title" value="{{$products->title}}" class="form-control" id="formrow-firstname-input">
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="form-group">
                                <label for="formrow-email-input">Product Price</label>
                                <input type="number" name="fee" value="{{$products->fee}}"  class="form-control" id="formrow-email-input">
                            </div>
                        </div>
                        <div class="mt-2">
                             <div class="form-group">
                                <label for="formrow-email-input">Product Description</label></br>
                                <textarea name="description" class="summernote">{{$products->description}}</textarea>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="form-group">
                                <label for="formrow-password-input">Product Image</label>
                                 <input type="file" name="image"  class="form-control-file" id="formrow-password-input">
                                 <img src="{{asset('storage/'.$products-> image)}}" class="mt-2" alt="" height="150" width="200" />
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary w-md">Update Product</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection