@extends('admin.app')

@section('title', 'Add Credits')

@section('contents')
<main role="main" class="col-md-12 ml-sm-auto col-lg-10 main">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Credits</h1>
    </div>
    
    <div class="container">
        <div class="form-container">
            <h2>Add Credit Record</h2>
            <form action="{{ route('credits.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="userName">Full Name</label>
                    <input type="text" class="form-control" id="userName" name="name" placeholder="Enter user's name" required>
                </div>
                <div class="form-group">
                    <label for="amountBorrowed">Address</label>
                    <input type="text" class="form-control" id="amountBorrowed" name="address" placeholder="Enter address" required>
                </div>
                <div class="form-group">
                    <label for="amountBorrowed">Contact Number</label>
                    <input type="text" class="form-control" id="amountBorrowed" name="contact" placeholder="Enter contact number" required>
                </div>
                {{-- <div class="form-group">
                    <label for="borrowDate">Date of Borrowing</label>
                    <input type="date" class="form-control" name="date" id="borrowDate" required>
                </div> --}}
                {{-- <div class="form-group">
                    <label for="remarks">Remarks</label>
                    <textarea class="form-control" id="remarks" rows="3" placeholder="Enter any additional remarks"></textarea>
                </div> --}}
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        {{-- <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Balance</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->balance }}</td>
                        <td>{{ $item->description }}</td>
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
        </table> --}}
        {{-- {{ $categories->onEachSide(1)->links() }} --}}
    </div>
</main>
@endsection
