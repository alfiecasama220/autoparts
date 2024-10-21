@extends('admin.app')

@section('title', 'Credits')

@section('contents')
<main role="main" class="col-md-12 ml-sm-auto col-lg-10 main">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Credits</h1>
        <div>
            {{-- <a href="{{ route('addCategory.create') }}" class="btn btn-primary shadow-sm">Add Category</a> --}}
            <a href="{{ route('credits.create') }}" class="btn btn-primary shadow-sm">Add Credits</a>
        </div>
        
    </div>

    <form action="{{ route('searchCredits') }}" method="GET">
        @csrf
        <div class="input-group mb-3 w-25">
                <input type="text" class="form-control" placeholder="Product Name"  value="{{ request('search') }}" name="search" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
        </div>
    </form>

    {{-- <div class="w-100 d-flex justify-content-end align-content-center">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Category
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a href="{{ route('balance.index') }}" class="dropdown-item">All</a>
                @foreach ($categories as $category)
                <form action="{{ route('balance.show', $category->id) }}">
                    <button type="submit" class="dropdown-item">{{ $category->name }}</button>
                </form>
                @endforeach
              
            </div>
          </div>
    </div> --}}

    {{-- <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div> --}}
    
    
    
    
    

        <div class="row justify-content-center mt-5">
            <div class="col-md-10">
                <h4>Recent Credits Transactions</h4>
                <table class="table table-hover transaction-table">
                    <thead>
                        <tr>
                            <th>UUID</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Credits</th>
                            <th>Paid</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Items as $items )
                        <input type="hidden" id="creditID" value="{{ $items->name }}">
                        <tr>
                            <td>{{ $items->uuid }}</td>
                            <td>{{ $items->name }}</td>
                            <td>{{ $items->contact }}</td>
                            <td>{{ $items->address }}</td>
                            <td class="text-success">₱ {{ number_format($items->borrowed, '2') }}</td>
                            <td class="text-success">₱ {{ number_format($items->paid, '2') }}</td>
                            <td>
                            
                            @if($items->status == 1) 
                                <span class="badge badge-success">{{$itemStatus = 'Completed';}}</span>
                            @else
                                <span class="badge badge-warning p-2">{{$itemStatus = 'Pending';}}</span>
                            @endif
                            </td>
                            {{-- <td>
                                
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="bi bi-credit-card-2-back-fill"></i> Pay
                                </button>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="bi bi-box-arrow-right"></i> Loan
                                </button>
                                
                            </td> --}}
                            <td><a class="badge badge-info p-2" href="{{ route('next.edit', $items->uuid) }}"><i class="bi bi-box-arrow-right"></i> Next</a></td>

                            {{-- <td><a class="badge badge-info p-2" href=""><i class="bi bi-credit-card-2-back-fill"></i> Pay</a>
                            <a class="badge badge-secondary p-2" href=""><i class="bi bi-box-arrow-right"></i> Borrow</a></td> --}}
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
</main>
@endsection
