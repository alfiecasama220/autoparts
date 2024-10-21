@extends('admin.app')

@section('title', 'Balance')

@section('contents')
<main role="main" class="col-md-12 ml-sm-auto col-lg-10 main">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Balance</h1>
        <div>
            {{-- <a href="{{ route('addCategory.create') }}" class="btn btn-primary shadow-sm">Add Category</a> --}}
            <a href="{{ route('balance.create') }}" class="btn btn-primary shadow-sm">Add Balance</a>
        </div>
    </div>

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
    
    
    
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="balance-card">
                    <h4>Your Balance</h4>
                    <div class="balance-amount">₱ {{ number_format($totalBalance, '2') }}</div>
                    <div class="balance-info">As of 
                        @php
                            $date = new DateTime();
                            $fDate = $date->format('F j, Y');
                            echo $fDate;
                        @endphp
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="balance-card">
                    <h4>User Total Credits</h4>
                    <div class="balance-amount">₱ {{ number_format($CreditBalance, '2') }}</div>
                    <div class="balance-info">As of 
                        @php
                            $date = new DateTime();
                            $fDate = $date->format('F j, Y');
                            echo $fDate;
                        @endphp
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <h4>Recent Transactions</h4>
                <table class="table table-hover transaction-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Address</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($balanceItems as $items )
                        <tr>
                            <td>{{ $items->created_at }}</td>
                            <td>{{ $items->address }}</td>
                            <td class="text-success">₱ {{ number_format($items->borrowed, '2') }}</td>
                            <td>
                            
                            @if($items->status == 1) 
                            <span class="badge badge-success">{{$itemStatus = 'Completed';}}</span>
                            @else
                            <span class="badge badge-warning">{{$itemStatus = 'Credits';}}</span>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
</main>
@endsection
