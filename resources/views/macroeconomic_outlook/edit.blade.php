@extends('layouts.master')

@section('content')
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form theme-form">
                            <!-- Display Success Message -->
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <!-- Display Error Message -->
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <h4>Edit Macroeconomic Document</h4>
                            <!-- Display Previous Documents -->
                            <div class="mb-3">
                                <label>Previous Documents</label><br>
                                @foreach (json_decode($document->file_path) as $filePath)
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="{{ asset('documents/' . $filePath) }}" target="_blank">{{ basename($filePath) }}</a>
                                        <form action="{{ route('macroeconomic-documents.delete', ['id' => $document->id, 'filename' => basename($filePath)]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger ms-2">Delete</button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                            
                            <!-- Add New Document -->
                            <form action="{{ route('macroeconomic-documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="name">Document Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $document->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="description">Document Description</label>
                                            <textarea class="form-control" id="description" name="description">{{ $document->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="new_document">New Document</label>
                                            <input type="file" class="form-control" id="new_document" name="new_document[]" accept=".pdf,.xls,.xlsx,.csv" multiple>
                                            <small class="text-muted">You can select multiple files by pressing Ctrl or Command key</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Update Document</button>
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
    <!-- Container-fluid Ends-->
</div>
@endsection
