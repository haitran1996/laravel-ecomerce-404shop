@extends('layout.admin')
@section('title', 'Create new product')
@section('invalid-search', 'disabled')
@section('content')
    <form method="post" enctype="multipart/form-data" action="{{ route('admin.products.store') }}">
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
            <label >Price</label>
            <input type="number" class="form-control @error('price') alert-danger @enderror" name="price" >
{{--            {{ number_format($Expense->price, 2) }}--}}
        </div>
        @error('price')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="form-group">
            <label for="">Category</label>
            <select name="category" class="custom-select @error('category') alert-danger @enderror">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
            </select>
        </div>
        @error('category')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="form-group">
            <label >Description</label>
            <textarea class="form-control @error('description') alert-danger @enderror" name='description' rows="3"></textarea>
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
