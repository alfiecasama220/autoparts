@extends('admin.app')

@section('title', 'Profiles')

@section('contents')
<main role="main" class="col-md-12 ml-sm-auto col-lg-10 main">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profiles</h1>
        <div>
            {{-- <a href="{{ route('addCategory.create') }}" class="btn btn-primary shadow-sm">Add Category</a> --}}
            {{-- <a href="{{ route('credits.create') }}" class="btn btn-primary shadow-sm">Add Credits</a> --}}
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card profile-card">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/150" class="profile-img rounded-circle mb-3" alt="Profile Image">
                        <h3 class="card-title">John Doe</h3>
                        <p class="card-text text-muted">Software Developer</p>
                        <a href="#" class="btn btn-primary">Edit Profile</a>
                        <form action="" method="POST" enctype="multipart/form-data" class="mt-3">
                            @csrf
                            <div class="form-group">
                                <label for="profilePic" class="btn btn-success">
                                    <i class="bi bi-upload"></i> Upload Profile Picture
                                    <input type="file" id="profilePic" name="profile_pic" class="d-none">
                                </label>
                            </div>
                            <button type="submit" class="btn btn-success mt-2">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">About Me</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae enim et erat feugiat scelerisque. Curabitur vitae dignissim eros.</p>
                    </div>
                </div>
                
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="card-title">Recent Activities</h4>
                        <ul class="list-group">
                            <li class="list-group-item">Activity 1 - <small class="text-muted">Just now</small></li>
                            <li class="list-group-item">Activity 2 - <small class="text-muted">1 hour ago</small></li>
                            <li class="list-group-item">Activity 3 - <small class="text-muted">Yesterday</small></li>
                        </ul>
                    </div>
                </div>
                
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="card-title">Contact Information</h4>
                        <ul class="list-group">
                            <li class="list-group-item">Email: john.doe@example.com</li>
                            <li class="list-group-item">Phone: (123) 456-7890</li>
                            <li class="list-group-item">Address: 123 Main Street, Anytown, USA</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
