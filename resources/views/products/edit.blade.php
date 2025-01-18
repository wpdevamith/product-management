@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product</h1>

    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="product_id">Product ID</label>
            <input type="text" name="product_id" id="product_id" class="form-control" value="{{ $product->product_id }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}">
        </div>

        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100" class="mt-2">
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>



@endsection
