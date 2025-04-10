@extends('layouts.master')

@section('content')
<div class="page-body">
    <!-- Container-fluid starts-->

    <div class="container-fluid">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update',  Auth::user()->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form theme-form">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="name">Full Name</label>
                                            <input class="form-control" type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" placeholder="Full Name *" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="email">Email Address</label>
                                            <input class="form-control" type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" placeholder="Email Address *" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="contact_number">Contact Number</label>
                                            <input class="form-control" type="text" id="contact_number" name="contact_number" value="{{ old('contact_number', Auth::user()->contact_number) }}" placeholder="Contact Number *" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="street">Street</label>
                                            <input class="form-control" type="text" id="street" name="street" value="{{ old('street', Auth::user()->street) }}" placeholder="Street *" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="city">City</label>
                                            <input class="form-control" type="text" id="city" name="city" value="{{ old('city', Auth::user()->city) }}" placeholder="City *" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="state">State</label>
                                            <input class="form-control" type="text" id="state" name="state" value="{{ old('state', Auth::user()->state) }}" placeholder="State *" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="zip_code">ZIP Code</label>
                                            <input class="form-control" type="text" id="zip_code" name="zip_code" value="{{ old('zip_code', Auth::user()->zip_code) }}" placeholder="ZIP Code *" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="country">Country</label>
                                            <input class="form-control" type="text" id="country" name="country" value="{{ old('country', Auth::user()->country) }}" placeholder="Country *" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="profile_image">Profile Image</label>
                                            <input class="form-control" type="file" id="profile_image" name="profile_image" accept="image/jpeg, image/png, image/jpg, image/gif">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="text-end"><button type="submit" class="btn btn-success me-3">Update Profile</button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @elseif (session('password_error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('password_error') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('update-password') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form theme-form">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="oldPasswordInput" class="form-label">Old Password</label>
                                            <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput" placeholder="Old Password">
                                            @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="newPasswordInput" class="form-label">New Password</label>
                                            <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput" placeholder="New Password">
                                            @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                            <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput" placeholder="Confirm New Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="text-end"><button type="submit" class="btn btn-success me-3">Update Password</button></div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection