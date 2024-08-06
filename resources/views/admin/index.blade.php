@extends('admin.app')

@section('title', 'Dashboard')

@section('contents')




        <main role="main" class="col-md-12 ml-sm-auto col-lg-10 main">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>
            
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Sales</h5>
                            <p class="card-text">This month: $10,000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">New Orders</h5>
                            <p class="card-text">50 new orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Inventory Status</h5>
                            <p class="card-text">Items in stock: {{ $totalStock }}</p>
                        </div>
                    </div>
                </div>
            </div>
            

{{-- 
            <div class="toast-container">
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="mr-auto">Notification</strong>
                        <small>Just now</small>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        Hello, this is a notification.
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>


<!-- Toast Container for Notifications -->
<div class="toast-container" id="toastContainer"></div> --}}

@endsection
