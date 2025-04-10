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
                            <form action="{{ route('send_questionnaire.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @if(session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Question Subject</label>
                                            <input class="form-control" type="text" name="question_subject" placeholder="Question Subject *" value="{{ old('question_subject') }}" required>
                                            @error('question_subject')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Question Description</label>
                                            <textarea class="form-control" name="question_description" rows="3" required>{{ old('question_description') }}</textarea>
                                            @error('question_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="document">Attachment</label>
                                            <input class="form-control" type="file" id="document" name="document" accept=".pdf,.xls,.xlsx,.csv">
                                            @error('document')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="text-end"><button type="submit" class="btn btn-success me-3">Send Questionnaire</button></div>
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
