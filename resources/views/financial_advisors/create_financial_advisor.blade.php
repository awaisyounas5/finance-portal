@extends('layouts.master')

@section('content')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    @if(session('success'))
                    <div class="alert alert-success mt-3" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('financial_advisors.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form theme-form">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="full_name">Full Name</label>
                                            <input id="full_name" name="full_name" class="form-control @error('full_name') is-invalid @enderror" type="text" placeholder="Full Name *" required value="{{ old('full_name') }}">
                                            @error('full_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="email">Email Address</label>
                                            <input id="email" name="email" class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email Address *" required value="{{ old('email') }}">
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="contact_number">Contact Number</label>
                                            <input id="contact_number" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror" type="text" placeholder="Contact Number *" required value="{{ old('contact_number') }}">
                                            @error('contact_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="street">Street</label>
                                            <input id="street" name="street" class="form-control @error('street') is-invalid @enderror" type="text" placeholder="Street *" required value="{{ old('street') }}">
                                            @error('street')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="city">City</label>
                                            <input id="city" name="city" class="form-control @error('city') is-invalid @enderror" type="text" placeholder="City *" required value="{{ old('city') }}">
                                            @error('city')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="state">State</label>
                                            <input id="state" name="state" class="form-control @error('state') is-invalid @enderror" type="text" placeholder="State *" required value="{{ old('state') }}">
                                            @error('state')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="zip_code">ZIP Code</label>
                                            <input id="zip_code" name="zip_code" class="form-control @error('zip_code') is-invalid @enderror" type="text" placeholder="ZIP Code *" required value="{{ old('zip_code') }}">
                                            @error('zip_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="country">Country</label>
                                            <input id="country" name="country" class="form-control @error('country') is-invalid @enderror" type="text" placeholder="Country *" required value="{{ old('country') }}">
                                            @error('country')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="password">Password</label>
                                            <input id="password" name="password" class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password *" required>
                                            @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="profile_image">Profile Image</label>
                                            <input id="profile_image" name="profile_image" class="form-control @error('profile_image') is-invalid @enderror" type="file">
                                            @error('profile_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success me-3">Create Financial Advisor</button>
                                        </div>
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
</div>
@endsection