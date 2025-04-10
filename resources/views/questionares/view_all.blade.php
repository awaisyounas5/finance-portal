@extends('layouts.master')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Questionnaire List By Financial Advisors</h4>
                        <p class="f-m-light mt-1">List of All The Questionnaires Sent By Financial Advisors.</p>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <div class="form theme-form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive theme-scrollbar">
                                        <table class="display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>Financial Advisor Name</th>
                                                    <th>Email</th>
                                                    <th>Subject</th>
                                                    <th>Description</th>
                                                    <th>Attachment</th>
                                                    <th>Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($qnas as $qna)
                                                @if($qna->financial_advisor->email !== 'admin@admin.com')
                                                <tr role="row" class="odd">
                                                    <td>{{ $qna->financial_advisor->name }}</td>
                                                    <td>{{ $qna->financial_advisor->email }}</td>
                                                    <td class="sorting_1">{{ $qna->question_subject }}</td>
                                                    <td>{{ $qna->question_description }}</td>
                                                    <td><a href="{{ asset('documents/' . $qna->attachment) }}">View Attachment</a></td>
                                                    <td>{{ $qna->created_at->format('d-m-Y') }}</td>
                                                    <td style="display:inline-flex;gap:5px;">
                                                        <button type="button" class="btn btn-primary btn-sm edit-btn" data-id="{{ $qna->id }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </button>

                                                        <form action="{{ route('sent_questionnaires.destroy', $qna->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" onclick="showConfirmation(this)" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var qnaId = button.getAttribute('data-id');
                window.location.href = '/sent_questionnaires/' + qnaId + '/edit'; // Corrected URL
            });
        });
    });

    function showConfirmation(button) {
        var form = button.closest('form'); // Find the closest form element
        var formId = form.id; // Get the ID of the form

        if (typeof Swal === 'undefined') {
            // Fallback to browser confirm if Sweetalert is not loaded
            if (confirm('Are you sure you want to delete this questionnaire?')) {
                form.submit();
            }
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form if user confirms
                form.submit();
            }
        });
    }
</script>
@endsection