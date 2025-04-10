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
                                <form method="POST" action="{{ route('notifications.create') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form theme-form">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label>Notification Title</label>
                                                    <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Notification Title *" required  value="{{ old('name') }}" name="name">
                                                    @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label>Description</label>
                                                    <textarea class="form-control @error('name') is-invalid @enderror" rows="3" required name="description">{{ old('description') }}</textarea>
                                                    @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="text-end">
                                                <button type="submit" class="btn btn-success me-3">Send Notification</button>
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