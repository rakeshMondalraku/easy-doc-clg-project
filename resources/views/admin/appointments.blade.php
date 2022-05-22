@extends('admin.layout.app')

@section('title')
    {{ $status }} Appointments
@endsection

@push('style')
    <link href="{{ asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Doctor</th>
                            <th>Patient</th>
                            <th>Weekday</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="view-modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('admin-assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "/admin/appointments/{{ strtolower($status) }}",
                columns: [{
                        data: 'doctor',
                        name: 'doctor'
                    },
                    {
                        data: 'patient',
                        name: 'patient'
                    },
                    {
                        data: 'weekday',
                        name: 'weekday'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ],
            });
        });

        function view(id) {
            $.LoadingOverlay('show');
            $.ajax({
                url: `{{ route('admin.appointments.detail') }}/${id}`,
                method: 'GET',
                success: function(res) {
                    $.LoadingOverlay('hide');
                    const office = res.availability.office;
                    const rows = [{
                            label: 'Doctor',
                            value: res.doctor.name
                        },
                        {
                            label: 'Patient',
                            value: res.patient.name
                        },
                        {
                            label: 'Problem',
                            value: res.problem
                        },
                        {
                            label: 'Day',
                            value: res.availability.weekday
                        },
                        {
                            label: 'Time',
                            value: `${moment(res.availability.start, 'HH:mm:ss').format('HH:mm A')} - ${moment(res.availability.end, 'HH:mm:ss').format('HH:mm A')}`
                        },
                        {
                            label: 'Address',
                            value: `${office.address} - ${office.city} - ${office.state} - ${office.zip}`
                        }
                    ];
                    let html = '';
                    rows.forEach(row => {
                        html += `<div class="row">
                                    <div class="col-md-3"><strong>${row.label}</strong></div>
                                    <div class="col-md-1"><strong>:</strong></div>
                                    <div class="col-md-8">${row.value}</div>
                                </div>`;
                    })
                    $('#view-modal .modal-body').html(html);
                    $('#view-modal').modal('show');
                },
                error: function() {
                    $.LoadingOverlay('hide');
                }
            });
        }
    </script>
@endpush
