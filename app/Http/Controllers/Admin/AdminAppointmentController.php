<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminAppointmentController extends Controller
{
    public function pending(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatable('pending');
        }
        $status = "Pending";

        return view('admin.appointments', compact('status'));
    }

    public function approved(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatable('approved');
        }
        $status = "Approved";

        return view('admin.appointments', compact('status'));
    }

    public function completed(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatable('completed');
        }
        $status = "Completed";

        return view('admin.appointments', compact('status'));
    }

    public function canceled(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatable('canceled');
        }
        $status = "Canceled";

        return view('admin.appointments', compact('status'));
    }

    public function datatable($status)
    {
        return DataTables::of(Appointment::where('status', $status)->with(['doctor', 'patient', 'availability']))
            ->addColumn('doctor', '{{$doctor["name"]}}')
            ->addColumn('patient', '{{$patient["name"]}}')
            ->addColumn('weekday', '{{$availability["weekday"]}}')
            ->addColumn('action', '
                <button class="btn btn-primary btn-circle btn-sm" title="View" onclick="view({{$id}})">
                    <i class="fas fa-eye"></i>
                </button>
            ')
            ->rawColumns(['doctor', 'patient', 'weekday', 'action'])
            ->make(true);
    }

    public function detail(Request $request, $id)
    {
        $appointment = Appointment::where('id', $id)->with(['doctor', 'patient', 'availability', 'availability.office'])->first();

        return $appointment;
    }
}
