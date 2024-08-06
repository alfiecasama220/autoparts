@extends('admin.app')

@section('title', 'Add Inventory Item')

@section('contents')
<main role="main" class="col-md-12 ml-sm-auto col-lg-10 main">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Category for the Item</h1>
    </div>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('addCategory.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Description</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
        </div>
    </div>
</main>
@endsection
