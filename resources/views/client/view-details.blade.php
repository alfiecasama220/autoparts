@extends('client.app')

@section('title', "view-details")

@section('content')

<main class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('/storage/' . $item->image) }}" class="card-img-top filled"  alt="{{ $item->name }}">
        </div>
        <div class="col-md-6">
            <h1>{{ $item->name }}</h1>
            <h3 class="text-muted">₱ {{ number_format($item->price, 2, '.', ',') }}</h3>
            <p>{{ $item->description }}</p>
            <a href="#" class="btn btn-primary btn-lg">Checkout</a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h3>Product Details</h3>
            <table class="table table-bordered">
                <tbody>
                    {{-- <tr>
                        <th>Category</th>
                        <td>{{ $item->name }}</td>
                    </tr> --}}
                    {{-- <tr>
                        <th>Name</th>
                        <td>{{ $item->name }}</td>
                    </tr> --}}
                    <tr>
                        <th>Stocks</th>
                        <td>{{ $item->quantity }}</td>
                    </tr>
                    <tr>
                        <th>Availability</th>
                        <td>{{ $availability}}</td>
                    </tr>
                    {{-- <tr>
                        <th>SKU</th>
                        <td>{{ $item->sku }}</td>
                    </tr> --}}
                    <tr>
                        <th>Specification</th>
                        <td>{{ $item->specification }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- <div class="row mt-5">
        <div class="col-12">
            <h3>Related Products</h3>
            <div class="row">
                @foreach($relatedItems as $relatedItem)
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('assets/images/Bosch-Evolution_2.jpg') }}" class="card-img-top" alt="{{ $relatedItem->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $relatedItem->name }}</h5>
                            <p class="card-text">₱ {{ number_format($relatedItem->price, 2, '.', ',') }}</p>
                            <a href="{{ route('product.show', $relatedItem->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div> --}}
</main>

@endsection
