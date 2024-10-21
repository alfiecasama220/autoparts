<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="styles.css">
    @vite('resources/css/app.css')
</head>
<body class="auth-bg">



    @include('layout.messages')

    @yield('contents')



    @vite('resources\js\app.js')
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
