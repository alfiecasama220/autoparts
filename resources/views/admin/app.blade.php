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
   @include('layout.messages')

    @include('admin.header')
    

    <div class="container-fluid">
        
        <div class="row">

            @include('admin.sidebar')
    
            @yield('contents')

    @vite('resources/js/app.js')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all buttons with the class 'btn-open-modal'
            const buttons = document.querySelectorAll('.btn-open-modal');

            // Add click event listener to each button
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    // Get the data-id attribute of the clicked button
                    const recordId = this.getAttribute('data-id');
                    
                    // Get the row with the corresponding ID
                    const row = document.getElementById('record-' + recordId);
                    const name = row.children[0].textContent;
                    const amount = row.children[1].textContent;
                    const date = row.children[2].textContent;

                    // Update the modal's content
                    document.getElementById('exampleModalCenterTitle').textContent = 'Details for ' + name;
                    document.getElementById('modalName').textContent = name;
                    document.getElementById('modalAmount').textContent = amount;
                    document.getElementById('modalDate').textContent = date;

                    // Show the modal
                    $('#exampleModalCenter').modal('show');
                });
            });
        });
    </script>

    <script src="{{ asset('assets/js/app.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> --}}
    
</body>
</body>
</html>
