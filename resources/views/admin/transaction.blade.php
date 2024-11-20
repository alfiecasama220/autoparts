@extends('admin.app')

@section('title', 'Balance')

@section('contents')

<main role="main" class="col-md-12 ml-sm-auto col-lg-10 main">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Inventory Item</h1>
    </div>
    
    <div class="card">
        <div class="card-body">
            
                @csrf
                @method('PATCH')
                <div class="form-group">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Category
                      </button>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                        Items
                      </button>
                </div>
                
                

                <div class="form-group mt-5">
                    <label for=""> DATA PREVIEW</label>
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Quantity</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <form action="{{ route('transaction.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <tr>
                                    <a href="{{ route('inventory.index') }}">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    
                                </a>
                                </tr>
                                <div class="form-group" @if($items->count() > 1) style='display: none'; @endif>
                                    <label for="quantity">Release</label>
                                    <input type="number" name="release" class="form-control" id="quantity" value="{{ $item->release }}" name="quantity" required>
                                </div>
                                <button type="submit" class="btn btn-primary"@if($items->count() > 1) style='display: none'; @endif>Save Changes</button>
                            </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td onclick="window.location.href='{{ route('transaction.index') }}'">All</td>
                        <td onclick="window.location.href='{{ route('transaction.index') }}'"></td>
                    </tr>
                    @foreach($category as $categories)
                    
                        <tr>
                            <a href="{{ route('inventory.index') }}">
                            <td onclick="window.location.href='{{ route('transaction.show', $categories->id) }}'">{{ $categories->id }}</td>
                            <td onclick="window.location.href='{{ route('transaction.show', $categories->id) }}'">{{ $categories->name }}</td>
                        </a>
                        </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>


    <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Items</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body w-100">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    
                        <tr>
                            <a href="{{ route('inventory.index') }}">
                            <td onclick="window.location.href='{{ route('transaction.edit', $item->id) }}'">{{ $item->id }}</td>
                            <td onclick="window.location.href='{{ route('transaction.edit', $item->id) }}'">{{ $item->name }}</td>
                        </a>
                        </tr>
                    
                    @endforeach
                </tbody>
            </table>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>
</main>
@endsection