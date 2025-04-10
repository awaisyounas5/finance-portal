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
                        <h4>Documents List</h4>
                        <p class="f-m-light mt-1">List of All The Documents Uploaded By You.</p>
                    </div>
                    <div class="card-body">
                        <div class="form theme-form">
                            @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="row">
                                <!-- Zero Configuration Starts-->
                                <div class="col-sm-12">
                                    <div class="table-responsive theme-scrollbar">
                                        <table class="display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>Document Name</th>
                                                    <th>Description</th>
                                                    <th>Attachment</th>
                                                    <th>Upload Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($documents as $document)
                                                <tr role="row" class="odd">
                                                    <td>{{ $document->name }}</td>
                                                    <td>{{ $document->description }}</td>
                                                    <td><a href="{{ asset('documents/' . $document->file_path) }}">View Attachment</a></td>
                                                    <td>{{ $document->created_at->format('d-m-Y') }}</td>
                                                    <td style="display:inline-flex;gap:5px;">
                                                        <button type="button" class="btn btn-primary btn-sm edit-btn" data-id="{{ $document->id }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <form action="{{ route('documents.destroy', $document->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" onclick="showConfirmation(this)">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Zero Configuration Ends-->
                            </div>
                        </div>
                        <!-- Scroll - vertical dynamic Ends-->
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
                var advisorId = button.getAttribute('data-id');
                window.location.href = '/documents/' + advisorId + '/edit';
            });
        });
    });

    function showConfirmation(button) {
        var form = button.closest('form'); // Find the closest form element
        var formId = form.id; // Get the ID of the form

        if (typeof Swal === 'undefined') {
            // Fallback to browser confirm if Sweetalert is not loaded
            if (confirm('Are you sure you want to delete this document?')) {
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