@extends('client.app')

@section('title', 'All Products')

@section('content')

<main class="container mt-5">
    <h1 class="text-center mb-5">All Products</h1>
    <div class="dropdown mb-4">
        {{-- <label for="category">Category</label> --}}
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach ($categories as $category )
                <a class="dropdown-item" href="{{ route('inventory.show' , $category->id) }}">{{ $category->name }}</a>
            @endforeach
          
        </div>
      </div>
    <div class="row">
        @foreach($items as $item)
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ asset('/storage/' . $item->image) }}" class="card-img-top filled" alt="Product 1">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="text-danger">{{ $item->category->name }}</p>
                    <p class="card-text description">{{ $item->description }}</p>
                    <h5 class="cardt-text">₱ {{ number_format($item->price, 2, '.', ',') }}</h5>
                    <a href="{{ route('view-details.show', $item->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="w-100 d-flex justify-content-center">{{ $items->onEachSide(1)->links() }}</div>
</main>

@endsection
