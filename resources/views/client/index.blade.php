@extends('client.app')

@section('title', 'Home')

@section('content')

<main class="container mt-5">
    <div class="hero-section text-center py-5">
        <h1>Welcome to Auto Parts E-Commerce</h1>
        <p>Your one-stop shop for all auto parts needs.</p>
        <a href="#" class="btn btn-primary">Shop Now</a>
    </div>
    <div class="header d-flex justify-content-between align-items-center mt-4">
        <div><h3 class="header mb-0">Products</h3></div>
        <div><a class="text-right" href="{{ route('seeAll') }}">See all</a></div> 
    </div>
    <div class="row mt-2">
        @foreach($items as $item)
        <a href="{{ route('view-details.show', $item->id) }}">
        <div class="col-md-4 mt-5">
            <div class="card">
                <div style="object-fit: cover;">
                <img src="{{ asset('/storage/' . $item->image) }}" class="card-img-top filled" alt="Product 1">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="text-danger">{{ $item->category->name }}</p>
                    <p class="card-text">{{ $item->description }}</p>

                    <h5 class="card-text">₱ {{ number_format($item->price, 2, '.', ',') }}</h5>
                    <a href="#" class="btn btn-primary">Buy Now</a>
                </div>
            </div>
        </a>
        </div>
        @endforeach

    </div>
</main>

@endsection
