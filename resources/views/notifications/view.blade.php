@extends('layouts.master')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                            <div class="card-header">
                              <h4>Notifications</h4>
                              <p class="f-m-light mt-1">List of All Notifications.</p>
                            </div>
                                <div class="card-body">
                                    <div class="form theme-form">
                                    <div class="row">
                                      <div class="col-sm-12">

                    <div class="table-responsive theme-scrollbar">
                      <div id="basic-1_wrapper" class="dataTables_wrapper no-footer">
                        <div class="dataTables_length" id="basic-1_length"></div><table class="display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                      <thead>
                                                        <tr role="row">
                                                            <th>Notification Title</th>
                                                            <th>Notification Description</th>
                                                            <th>Date & Time</th>
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                        <tbody>
                        @foreach($notifications as $notification)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{ $notification->name }}</td>
                            <td>{{ $notification->description }}</td>
                            <td>{{ $notification->created_at }}</td>
                            <td>{{ $notification->status == "Y" ? 'Read' : 'Un-Read' }}</td>
                            <td style="display:inline-flex;gap:5px;"> 
    @if($notification->status == "Y")
        <form method="POST" action="{{ route('notifications.update_status', ['id' => $notification->id, 'status' => 'N']) }}">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-open"></i></button>
        </form>
        <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" id="deleteForm{{ $notification->id }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="showConfirmation(this)" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>
    @else
        <form method="POST" action="{{ route('notifications.update_status', ['id' => $notification->id, 'status' => 'Y']) }}">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-primary"><i class="fa fa-envelope"></i></button>
        </form>
        <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" id="deleteForm{{ $notification->id }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="showConfirmation(this)" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>
    @endif
</td>


                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
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
    function showConfirmation(button) {
        var form = button.closest('form'); // Find the closest form element
        var formId = form.id; // Get the ID of the form

        if (typeof Swal === 'undefined') {
            // Fallback to browser confirm if Sweetalert is not loaded
            if (confirm('Are you sure you want to delete this Notification?')) {
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