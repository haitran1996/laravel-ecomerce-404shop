@extends('layout.admin')
@section('title','Products')
@section('action')
    {{ route("admin.products.search") }}
@endsection
@section('content')
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Category</th>
            <th>Description</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $key => $product)
            <tr>
                <td scope="row">{{++$key}}</td>
                <td>{{ $product->name }}</td>
                <td><img src="{{ asset("storage/$product->image") }}" alt="" style="width: 50px"></td>
                <td>{{ number_format($product->price,0,'','.')}}</td>
                <td>{{ $product->category()->first()->name }}</td>
                <td>{{ $product->description }}</td>

{{--                <td>--}}
{{--                    <a href="{{ route("cart.create", $product->id) }}" class="btn btn-block">Add to cart</a>--}}
{{--                </td>--}}


                <td>
                    <a href="{{route('admin.products.delete',$product->id)}}" onclick="return confirm('Are you sure delete this product?')" class="btn btn-danger">Delete</a>
                    <a href="{{ route("admin.products.edit", $product->id) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
