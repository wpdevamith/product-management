@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product List</h1>

   
    <form method="GET" action="{{ route('products.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by ID, Name, Description, or Price" 
                   value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    
    <div class="mb-4">
        <span>Sort by:</span>
        <a href="{{ route('products.index', ['sort_by' => 'name', 'sort_order' => request('sort_order') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}" 
           class="btn btn-link">
            Name 
            @if(request('sort_by') === 'name')
                ({{ request('sort_order') === 'asc' ? 'Ascending' : 'Descending' }})
            @endif
        </a>

        <a href="{{ route('products.index', ['sort_by' => 'price', 'sort_order' => request('sort_order') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}" 
           class="btn btn-link">
            Price 
            @if(request('sort_by') === 'price')
                ({{ request('sort_order') === 'asc' ? 'Ascending' : 'Descending' }})
            @endif
        </a>
    </div>

    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_id }}</td>
                <td>{{ $product->name }}</td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->stock ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No products found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>


    {{ $products->appends(request()->query())->links() }}
</div>
@endsection
