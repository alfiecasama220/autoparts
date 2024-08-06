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