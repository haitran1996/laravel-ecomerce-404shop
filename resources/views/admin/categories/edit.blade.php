@extends('layout.admin')
@section('title','Edit category')
@section('invalid-search', 'disabled')
@section('content')
    <form method="post" enctype="multipart/form-data" action="{{ route('admin.categories.update',$category->id) }}">
        @csrf
        <div class="form-group">
            <label >Name</label>
            <input type="text" class="form-control @error('name') alert-danger @enderror"
                   name="name" value="{{$category->name}}">
        </div>
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label >Image</label><br>
            <img src="{{ asset("storage/".$category->image) }}" alt="" style="width: 100px">
            <input type="file" class="form-control @error('image') alert-danger @enderror"
                   name="image" value="">
        </div>
        @error('image')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label >Description</label>
            <textarea class="form-control @error('desription') alert-danger @enderror"
                      name='description' rows="3">{{$category->description}}</textarea>
        </div>
        @error('description')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <input type="submit" value="Update" class="btn btn-success">
            {{--            <a href="{{ route('admin.categories.index') }}">--}}
            {{--                <button>Cancel</button></a>--}}
        </div>
    </form>
    @endsection
