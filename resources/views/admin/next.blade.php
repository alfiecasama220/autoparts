@extends('admin.app')

@section('title', 'Pay or Loan')

@section('contents')
<main role="main" class="col-md-12 ml-sm-auto col-lg-10 main">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Credits</h1>
        <div>
            {{-- <a href="{{ route('addCategory.create') }}" class="btn btn-primary shadow-sm">Add Category</a> --}}
            <a href="{{ route('credits.create') }}" class="btn btn-primary shadow-sm">Add Credits</a>
        </div>
    </div>

    @foreach ($Items as  $item )
                    {{-- {{ $item->name }} --}}
    @endforeach

    @foreach ($Balance as $balance)
        
    @endforeach

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('balance.update', $item->uuid) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Pay</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title pb-4 text-success" id="exampleModalCenterTitle">Credits Balance Payable: ₱ {{ number_format($item->borrowed, '2') }}</h5>
                    
                    {{-- <select class="custom-select my-1 mr-sm-2" name="amount" id="inlineFormCustomSelectPref">
                        <option selected>Your credits</option>
                        @foreach ($Balance as $balance )
                            <option value="{{ $balance->id }}">₱ {{ $balance->balance }}</option>
                        @endforeach
                        
                      </select> --}}

                      {{-- <input type="hidden" name="amountID"> --}}

                        <div class="form-group">
                            <label for="exampleInputEmail1">Amount</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="amount" aria-describedby="emailHelp" placeholder="Enter amount" required>
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descripion</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" required></textarea>
                    </div>
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('next.update', $item->uuid) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Credit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title pb-4 text-success" id="exampleModalCenterTitle">Credits Balance Payable: ₱ {{ number_format($item->borrowed, '2') }}</h5>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Amount</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="amount" aria-describedby="emailHelp" placeholder="Enter amount" required>
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descripion</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" required>@if (isset($balance->description))
                                {{ $balance->description }}
                            @endif</textarea>
                    </div>
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    <div class="w-100 d-flex justify-content-center align-items-center flex-column" style="height: 80vh">
        <div class="col-md-8 w-100">
            <h4>Current Transactions</h4>
            <table class="table table-hover transaction-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Credits</th>
                        <th>Paid</th>
                        <th>Status</th>
                        {{-- <th>Action</th>
                         --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Items as $items )
                    <input type="hidden" id="creditID" value="{{ $items->name }}">
                    <tr>
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
                        {{-- <td><a class="badge badge-info p-2" href="{{ route('credits.edit', $items->id) }}"><i class="bi bi-box-arrow-right"></i> Next</a></td> --}}

                        {{-- <td><a class="badge badge-info p-2" href=""><i class="bi bi-credit-card-2-back-fill"></i> Pay</a>
                        <a class="badge badge-secondary p-2" href=""><i class="bi bi-box-arrow-right"></i> Borrow</a></td> --}}
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
            <div class="w-100 text-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="bi bi-credit-card-2-back-fill"></i> Pay
                  </button>
                
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter2">
                    <i class="bi bi-box-arrow-right"></i> Credit
                </button>
                {{-- <a href="/loan" class="btn btn-loan btn-info p-4 " style="font-size: 14px"><i class="bi bi-credit-card-2-back-fill"></i> Pay</a>
                <a href="/loan" class="btn btn-loan btn-info p-4 " style="font-size: 14px"><i class="bi bi-box-arrow-right"></i> Credit</a>   --}}
            </div>
             
        </div>
    </div>
</main>
@endsection
