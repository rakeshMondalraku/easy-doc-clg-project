@extends('doctor.layout.app')

@section('title', 'Availabilities')

@push('style')
    <link href="{{ asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('title-right')
    <button class="btn btn-primary btn-icon-split float-right" onclick="openAddDialog()">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Add</span>
    </button>
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Weekday</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Office</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-new-modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <form action="{{ route('doctor.availabilities.store') }}" method="POST" id="add-new-form">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="add-error-message"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Office</label>
                                    <select class="form-control" name="office" required>
                                        <option value="" selected disabled>Choose</option>
                                        @foreach ($offices as $office)
                                            <option value="{{ $office->id }}">
                                                {{ $office->address }} - {{ $office->city }} - {{ $office->state }} -
                                                {{ $office->zip }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Weekday</label>
                                    <select class="form-control" name="weekday" required>
                                        <option value="" selected disabled>Choose</option>
                                        @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Start Time</label>
                                    <input type="time" class="form-control" name="start" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>End Time</label>
                                    <input type="time" class="form-control" name="end" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="update-modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <form method="POST" id="update-form">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="update-error-message"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Office</label>
                                    <select class="form-control" name="office" required>
                                        <option value="" selected disabled>Choose</option>
                                        @foreach ($offices as $office)
                                            <option value="{{ $office->id }}">
                                                {{ $office->address }} - {{ $office->city }} - {{ $office->state }}
                                                -
                                                {{ $office->zip }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Weekday</label>
                                    <select class="form-control" name="weekday" required>
                                        <option value="" disabled>Choose</option>
                                        @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Start Time</label>
                                    <input type="time" class="form-control" name="start" required />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>End Time</label>
                                    <input type="time" class="form-control" name="end" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('admin-assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/jquery-form/jquery.form.min.js') }}"></script>
    <script>
        let table = null;
        $(document).ready(function() {
            table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('doctor.availabilities.index') }}",
                columns: [{
                        data: 'weekday',
                        name: 'weekday'
                    },
                    {
                        data: 'start',
                        name: 'start'
                    },
                    {
                        data: 'end',
                        name: 'end'
                    },
                    {
                        data: 'office',
                        name: 'office',
                        orderable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ],
            });

            $('#add-new-form').ajaxForm({
                resetForm: true,
                beforeSubmit: function() {
                    $('#add-error-message').html('');
                    $('#add-new-modal .modal-content').LoadingOverlay('show');
                },
                success: function(response) {
                    table.ajax.reload();
                    $('#add-new-modal .modal-content').LoadingOverlay('hide');
                    $('#add-new-modal').modal('hide');
                    toastr.success(response.message);
                },
                error: function(response) {
                    $('#add-new-modal .modal-content').LoadingOverlay('hide');
                    const errors = response.responseJSON;
                    let errorsHtml = '<div class="alert alert-danger"><ul>';

                    if (response.status == 422) {
                        $.each(errors.errors, function(k, v) {
                            errorsHtml += '<li>' + v + '</li>';
                        });
                    } else {
                        errorsHtml += '<li>' + errors.message + '</li>';
                    }

                    errorsHtml += '</ul></di>';

                    $('#add-error-message').html(errorsHtml);
                },
            });
        });

        function openAddDialog() {
            $('#add-new-modal').modal('show');
        }

        function edit(id) {
            $.LoadingOverlay('show');
            $.ajax({
                url: `{{ route('doctor.availabilities.index') }}/${id}/edit`,
                method: 'GET',
                success: function(res) {
                    $.LoadingOverlay('hide');
                    initUpdateForm(res.id);
                    $('#update-form [name="office"]').val(res.office_id);
                    $('#update-form [name="weekday"]').val(res.weekday);
                    $('#update-form [name="start"]').val(res.start);
                    $('#update-form [name="end"]').val(res.end);
                    $('#update-modal').modal('show');

                },
                error: function() {
                    $.LoadingOverlay('hide');
                }
            });
        }

        function initUpdateForm(editId) {
            $('#update-form').ajaxForm({
                url: `{{ route('doctor.availabilities.index') }}/${editId}`,
                method: 'PUT',
                resetForm: true,
                beforeSubmit: function() {
                    $('#update-error-message').html('');
                    $('#update-modal .modal-content').LoadingOverlay('show');
                },
                success: function(response) {
                    table.ajax.reload();
                    $('#update-modal .modal-content').LoadingOverlay('hide');
                    $('#update-modal').modal('hide');
                    toastr.success(response.message);
                },
                error: function(response) {
                    $('#update-modal .modal-content').LoadingOverlay('hide');
                    const errors = response.responseJSON;
                    let errorsHtml = '<div class="alert alert-danger"><ul>';

                    if (response.status == 422) {
                        $.each(errors.errors, function(k, v) {
                            errorsHtml += '<li>' + v + '</li>';
                        });
                    } else {
                        errorsHtml += '<li>' + errors.message + '</li>';
                    }

                    errorsHtml += '</ul></di>';

                    $('#update-error-message').html(errorsHtml);
                },
            });
        }

        function remove(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                focusCancel: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ route('doctor.availabilities.index') }}/${id}`,
                        method: 'DELETE',
                        success: function(res) {
                            $.LoadingOverlay('hide');
                            table.ajax.reload();
                            toastr.success(res.message);
                        },
                        error: function() {
                            $.LoadingOverlay('hide');
                        }
                    });
                }
            })
        }
    </script>
@endpush
