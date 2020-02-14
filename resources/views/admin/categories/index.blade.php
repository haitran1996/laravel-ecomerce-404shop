@extends('layout.admin')
@section('title', 'Categories')
@section('action')
    {{ route("admin.categories.search") }}
@endsection
@section('content')
    <a href="{{ route('products.show',1) }}">aaa yamete</a>
    <table class="table table-striped table-inverse table-responsive" style="width: 100%">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Image</th>
            <th>Description</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @if(empty($categories))
            <tr>
                <td colspan="5">No data found with this keyword</td>
            </tr>
            @endif

            @foreach($categories as $key => $category)
                <tr>
                    <td scope="row">{{++$key}}</td>
                    <td>{{ $category->name }}</td>
                    <td><img src="{{ asset("storage/".$category->image) }}" alt="" style="width: 100px"></td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{route('admin.categories.delete',$category->id)}}" onclick="return confirm('Are you sure delete this category?')" class="btn btn-danger">Delete</a>
                        <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
@endsection
