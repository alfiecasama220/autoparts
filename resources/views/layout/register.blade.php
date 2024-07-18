@extends('layout.app')

@section('title', 'Admin Register')

@section('contents')



<div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-3">
            <div class="card shadow-lg bg-dark text-light">
                <div class="card-body text-center">
                    <img src="/assets/images/logo2.png" alt="Company Logo" class="mb-4 logo">
                    <h3 class="card-title mb-4">User Registration</h3>
                    <form action="{{ route('registerPost') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark border-0 ml-1"><i class="bi bi-person-fill"></i></span>
                                </div>
                                <input type="text" class="form-control bg-light border-0 text-dark @if(session('error')) is-invalid @elseif(old()) is-valid @endif" name="name" id="name" placeholder="Name" value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark border-0 mr-1"><i class="bi bi-envelope-fill"></i></span>
                                </div>
                                <input type="email" class="form-control bg-light text-dark @if(session('error') || $errors->has('email')) is-invalid @elseif(old() && !$errors->has('email')) is-valid @endif" name="email" id="Email" placeholder="Email" required>
                            </div>
                        </div>                  
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark border-0"><i class="bi bi-key-fill"></i></i></span>
                                </div>
                                <input type="password" class="form-control bg-light text-dark @if(session('error') || $errors->has('email')) is-invalid @endif" name="password" id="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark border-0"><i class="bi bi-people-fill"></i></i></span>
                                </div>
                                <select class="custom-select bg-dark border text-light @if(session('error')) is-invalid) is-valid @endif" id="roles" name="role" required>
                                    <option value="">Select Role</option>
                                    <option value="Admin">Admin</option>
                                    {{-- <option value="manager">Manager</option>
                                    <option value="staff">Staff</option> --}}
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-4">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection