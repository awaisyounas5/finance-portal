@extends('layouts.master')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form theme-form">
                            @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name">Document Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name', $document->name) }}" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description">Document Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $document->description) }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="new_document">New Document</label>
                                    <input type="file" class="form-control @error('new_document') is-invalid @enderror" id="new_document" name="new_document" accept=".pdf,.xls,.xlsx,.csv">
                                    @error('new_document')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Previous Document</label><br>
                                    <a href="{{ asset('documents/' . $document->file_path) }}" target="_blank">View Previous Document</a><br>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Document</button>
                                <a href="{{ route('documents.index') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
