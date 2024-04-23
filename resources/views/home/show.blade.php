@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2  mb-md-0 mx-auto">
        <li><a href="{{route('home.index')}}" class="nav-link px-2 text-secondary">Create Product list</a></li>
        <li><a href="{{route('home.show')}}" class="nav-link px-2 text-secondary">Show Product</a></li>
        </ul>
        <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Product list</h4>
                    <p class="card-title-desc">{{Session::get('message')}}</p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl On</th>
                            <th>Product Title</th>
                            <th>product price</th>
                            <th>image</th>
                            <th>Description</th>
                            
                            <th>Action</th>
                        </tr>
                        </thead>

                        @foreach($products as $product)
                        <tbody>
                        
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->fee}}</td>
                                <td>
                                    <img src="{{asset($product->image)}}"width ="70px"alt="">
                                </td>
                                <td>{{$product->description}}</td>
                                
                                <td>
                                    <a href="{{route('product.edit',['id'=> $product->id])}}" class="btn btn-primary" title="View Course Details">
                                        Edit
                                    </a>
                                    <a href="{{route('product.delete',['id'=> $product->id])}}" class="btn btn-danger" title="View Course Details">
                                       Delete
                                    </a>
                                </td>
                            </tr>
                        
                        </tbody>
                        @endforeach
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
        

        @endauth
    </div>
@endsection
