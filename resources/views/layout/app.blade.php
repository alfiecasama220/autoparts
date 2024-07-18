<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="styles.css">
    @vite('resources\css\app.css');
</head>
<body class="auth-bg">



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
    <div class="toast-container" aria-live="polite" aria-atomic="true">
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

    @yield('contents')



    @vite('resources\js\app.js')

    <script>
        function showToast() {
            const toast = document.getElementById('toast');

            toast.classList.add('show');

            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        function trigger() {
            showToast();
        }
    </script>
</body>
</html>
