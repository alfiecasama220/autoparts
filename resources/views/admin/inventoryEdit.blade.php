@extends('admin.app')

@section('title', 'Edit Inventory Item')

@section('contents')

<main role="main" class="col-md-12 ml-sm-auto col-lg-10 main">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Inventory Item</h1>
    </div>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('inventory.store', $editItem->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Item Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $editItem->name }}" required>
                </div>
                <div class="form-group">
                    <label for="category">Description</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"> {{ $editItem->description }}</textarea>
                    {{-- <input type="text" class="form-control" id="category" name="category" required> --}}
                </div>
                <div class="form-group">
                    <label for="category">Specification</label>
                    <textarea name="specification" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $editItem->specification }}</textarea>
                    {{-- <input type="text" class="form-control" id="category" name="category" required> --}}
                </div>
                <div class="form-group mb-3">
                    <label for="Category">Category</label>
                    <select class="custom-select" name="category" required>
                      <option value="{{ $editItem->category }}">Choose...</option>
                        @foreach ($category as $categories )
                            <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">Example invalid custom select feedback</div>
                  </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $editItem->quantity }}" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $editItem->price }}" required>
                </div>
                <!-- <label class="text-primary" for="">Upload image</label>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" name="image" id="validatedCustomFile" required>
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                  </div> -->
                <button type="submit" class="btn btn-primary">Edit Item</button>
            </form>
        </div>
    </div>
</main>
@endsection
