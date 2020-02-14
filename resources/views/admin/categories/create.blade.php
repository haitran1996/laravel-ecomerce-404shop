@extends('layout.admin')
@section('title', 'Create new category')
@section('invalid-search', 'disabled')
@section('content')
    <form method="post" enctype="multipart/form-data" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="form-group">
            <label >Name</label>
            <input type="text" class="form-control @error('name') alert-danger @enderror" name="name" >
        </div>
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label >Image</label>
            <input type="file" class="form-control @error('image') alert-danger @enderror" name="image" >
        </div>
        @error('image')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label >Description</label>
            <textarea class="form-control @error('description') alert-danger @enderror" name='description'rows="3"></textarea>
        </div>
        @error('description')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <input type="submit" value="Create" class="btn btn-success">
{{--            <a href="{{ route('admin.categories.index') }}">--}}
{{--                <button>Cancel</button></a>--}}
        </div>
    </form>
@endsection
