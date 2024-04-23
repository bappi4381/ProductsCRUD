@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2  mb-md-0 mx-auto">
        <li><a href="{{route('home.index')}}" class="nav-link px-2 text-secondary">Create Product list</a></li>
        <li><a href="{{route('home.show')}}" class="nav-link px-2 text-secondary">Show Product</a></li>
        </ul>

        <div class="row mt-4">
        <div class="col mx-auto">
            <div class="card" style="width: 38rem;">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add Product Form</h4>
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    <form action="{{route('product.create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Product title</label>
                                <input type="text"  name="title" class="form-control" id="formrow-firstname-input">
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="form-group">
                                <label for="formrow-email-input">Product Price</label>
                                <input type="number" name="fee" class="form-control" id="formrow-email-input">
                            </div>
                        </div>
                        <div class="mt-2">
                             <div class="form-group">
                                <label for="formrow-email-input">Product Description</label></br>
                                <textarea name="description" class="summernote"></textarea>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="form-group">
                                <label for="formrow-password-input">Product Image</label>
                                 <input type="file" name="image" class="form-control-file" id="formrow-password-input">
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary w-md">Create a New Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

         </div>
        @endauth

        @guest
        <h1>Product List</h1>
        
        <div class="row mt-4">
        @foreach($products as $product)
            <div class = "col-md-4 mt-4">
                 <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset($product->image)}}" alt="Card image cap"style="height:250px;">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->title}}</h5>
                        <p>Tk.{{$product->fee}}</p>
                    </div>
                 </div>
             </div>
             @endforeach
        </div>
        
        @endguest
    </div>
@endsection
