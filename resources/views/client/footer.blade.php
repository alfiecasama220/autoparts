<footer class="footer mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 d-flex align-items-center">
                <img src="{{ asset('assets/images/lands.png') }}" width="60%" alt="Logo" class="footer-logo">
                {{-- <span class="ml-2">Auto Parts E-Commerce</span> --}}
            </div>
            <div class="col-md-4 text-center">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="footer-link">Home</a></li>
                    <li><a href="#" class="footer-link">Shop</a></li>
                    <li><a href="#" class="footer-link">About</a></li>
                    <li><a href="#" class="footer-link">Contact</a></li>
                    <li><a href="{{ route('login') }}" class="footer-link">Login</a></li>
                </ul>
            </div>
            <div class="col-md-4 text-right">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                    <li>Email: info@autoparts.com</li>
                    <li>Phone: (123) 456-7890</li>
                    <li>Address: 123 Auto Parts St., City, State, ZIP</li>
                </ul>
                <div class="social-icons">
                    <a href="#" class="footer-link"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="footer-link"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="footer-link"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="footer-link"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom text-center pt-3">
        &copy; 2024 Kens Garage. All rights reserved.
    </div>
</footer>
