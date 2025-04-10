<!-- edit_financial_advisor.blade.php -->
@extends('layouts.master')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Financial Advisor</h4>
                        <p class="f-m-light mt-1">Edit Financial Advisor Contact Details by filling the form below.</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('financial_advisors.update', $financialAdvisor->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Full Name -->
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                    <div class="form-group">
                                        <label for="full_name">Full Name:</label>
                                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name', $financialAdvisor->name) }}">
                                        @error('full_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $financialAdvisor->email) }}">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Contact Number -->
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                    <div class="form-group">
                                        <label for="contact_number">Contact Number:</label>
                                        <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ old('contact_number', $financialAdvisor->contact_number) }}">
                                        @error('contact_number')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Address -->
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                    <div class="form-group">
                                        <label for="street">Street:</label>
                                        <input type="text" class="form-control" id="street" name="street" value="{{ old('street', $financialAdvisor->street) }}">
                                        @error('street')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                    <div class="form-group">
                                        <label for="city">City:</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $financialAdvisor->city) }}">
                                        @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                    <div class="form-group">
                                        <label for="state">State:</label>
                                        <input type="text" class="form-control" id="state" name="state" value="{{ old('state', $financialAdvisor->state) }}">
                                        @error('state')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                    <div class="form-group">
                                        <label for="zip_code">Zip Code:</label>
                                        <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ old('zip_code', $financialAdvisor->zip_code) }}">
                                        @error('zip_code')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                    <div class="form-group">
                                        <label for="country">Country:</label>
                                        <input type="text" class="form-control" id="country" name="country" value="{{ old('country', $financialAdvisor->country) }}">
                                        @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                    <div class="form-group">
                                        <label for="profile_image">Profile Image:</label>
                                        <input type="file" class="form-control-file" id="profile_image" name="profile_image">
                                        @error('profile_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Update Button -->
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection