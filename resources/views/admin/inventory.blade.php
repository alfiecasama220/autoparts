@extends('admin.app')

@section('title', 'Inventory')

@section('contents')
<main role="main" class="col-md-12 ml-sm-auto col-lg-10 main">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Inventory</h1>
        <div>
            <a href="{{ route('addCategory.create') }}" class="btn btn-primary shadow-sm">Add Category</a>
            <a href="{{ route('inventory.create') }}" class="btn btn-primary shadow-sm">Add Item</a>
        </div>
    </div>

    <form action="{{ route('search') }}" method="GET">
        @csrf
        <div class="input-group mb-3 w-25">
                <input type="text" class="form-control" placeholder="Product Name"  value="{{ request('search') }}" name="search" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            
        </div>
    </form>

    <div class="w-100 d-flex justify-content-end align-content-center">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Category
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a href="{{ route('inventory.index') }}" class="dropdown-item">All</a>
                @foreach ($categories as $category)
                <form action="{{ route('inventory.show', $category->id) }}">
                    <button type="submit" class="dropdown-item">{{ $category->name }}</button>
                </form>
                @endforeach
              
            </div>
          </div>
          
    </div>

    
    
    
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventoryItems as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $inventoryItems->onEachSide(1)->links() }}
    </div>
</main>
@endsection
