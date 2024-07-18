@use('Illuminate\Support\Facades\Vite')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    
</head>
<body class="dashboard">
    @if (session('error'))
            <script>
                window.addEventListener('load', function (event) {
                    trigger();
                }) 
            </script>
        @elseif(session('success') || $errors->has('email'))
            <script>
                window.addEventListener('load', function (event) {
                    trigger();
                }) 
            </script>
        {{-- @else
            <script>
                window.addEventListener('load', function (event) {
                    trigger();
                }) 
            </script> --}}
        @endif

    {{-- <div class="container">
        <!-- Your page content here -->
        <button onclick="window.showToast()" class="btn btn-primary">Show Toast</button>
    </div> --}}
    
    <!-- Toast Container -->
    <div id="toast-container" class="toast-container" aria-live="polite" aria-atomic="true">
        <div id="toast" class="toast toast-success
        
        @if(session('error') || $errors->has('email'))
            bg-danger
        @else
            bg-success
            
        @endif
        
        " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body text-light">

                @if (session('error'))
                    {{ session('error') }}
                @elseif(session('success'))
                    {{ session('success') }}
                @else
                    {{ $errors->first('email') }}
                @endif
            </div>
        </div>
    </div>

    @include('admin.header')
    

    <div class="container-fluid">
        
        <div class="row">

            @include('admin.sidebar')
    
            @yield('contents')

    @vite('resources/js/app.js')

    <script>
        function showToast() {
            const toast = document.getElementById('toast');
            const toastContainer = document.getElementById('toast-container');

            toast.classList.add('show');

            setTimeout(() => {
                toast.classList.remove('show');
                toastContainer.classList.add('hide');
            }, 3000);
        }

        function trigger() {
            showToast();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</body>
</html>
