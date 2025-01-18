@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product Details</h1>

    <div class="card">
        <div class="card-body">
            <h2>{{ $product->name }}</h2>
            <p><strong>Product ID:</strong> {{ $product->product_id }}</p>
            <p><strong>Description:</strong> {{ $product->description }}</p>
            <p><strong>Price:</strong> ${{ $product->price }}</p>
            <p><strong>Stock:</strong> {{ $product->stock ?? 'N/A' }}</p>
            <p>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="max-width: 200px;">
            </p>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
        </div>
    </div>
</div>
@endsection
