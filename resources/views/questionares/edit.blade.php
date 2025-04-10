@extends('layouts.master')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Qna</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('sent_questionnaires.update', $qna->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="question_subject" class="form-label">Question Subject</label>
                                <input type="text" class="form-control" id="question_subject" name="question_subject" value="{{ old('question_subject', $qna->question_subject) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="question_description" class="form-label">Question Description</label>
                                <textarea class="form-control" id="question_description" name="question_description" rows="3" required>{{ old('question_description', $qna->question_description) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="attachment" class="form-label">Attachment</label>
                                <input type="file" class="form-control" id="attachment" name="attachment" accept=".pdf,.xls,.xlsx,.csv">
                            </div>

                            @if ($qna->attachment)
                            <div class="mb-3">
                                <label>Previous Document</label><br>
                                <a href="{{ asset('documents/' . $qna->attachment) }}" target="_blank">View Previous Document</a><br>
                            </div>
                            @endif

                            <button type="submit" class="btn btn-primary">Update Qna</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection