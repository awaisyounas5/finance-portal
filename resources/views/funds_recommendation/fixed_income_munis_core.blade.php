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
                        <h4>Fixed Income - Munis | Core Documents</h4>
                        <p class="f-m-light mt-1">List of All The PDF's uploaded in this category.</p>
                    </div>
                    <div class="card-body">
                        <div class="form theme-form">
                            <div class="row">
                                <!-- Zero Configuration  Starts-->
                                <div class="col-sm-12">
                                            <div class="table-responsive theme-scrollbar">
                                                <table class="display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>Document Name</th>
                                                            <th>Description</th>
                                                            <th>Attachment</th>
                                                            <th>Date</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                        <tr role="row" class="odd">
                        <td class="sorting_1">Fund's Recommendation</td>
                            <td>Some Description For the PDF.</td>
                            <td><a href="#">View PDF</a></td>
                            <td>10-10-2024</td>
                            <td style="display:inline-flex;gap:5px;">

                                                                <form action="#" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-danger btn-sm"data-toggle="tooltip" data-placement="top" title="Delete">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                          </tr></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Zero Configuration  Ends-->
                                    <!-- Complex headers (rowspan and colspan) Starts-->
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
<!-- Container-fluid Ends-->
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var advisorId = button.getAttribute('data-id');
                window.location.href = '/financial_advisors/' + advisorId + '/edit';
            });
        });
    });
</script>

<script>
    function showConfirmation(button) {
        var form = button.closest('form'); // Find the closest form element
        var formId = form.id; // Get the ID of the form

        if (typeof Swal === 'undefined') {
            // Fallback to browser confirm if Sweetalert is not loaded
            if (confirm('Are you sure you want to delete this advisor?')) {
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