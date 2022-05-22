<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class DoctorAppointmentController extends Controller
{
    public function pending(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatable('pending');
        }
        $status = "Pending";

        return view('doctor.appointments', compact('status'));
    }

    public function approved(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatable('approved');
        }
        $status = "Approved";

        return view('doctor.appointments', compact('status'));
    }

    public function completed(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatable('completed');
        }
        $status = "Completed";

        return view('doctor.appointments', compact('status'));
    }

    public function canceled(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatable('canceled');
        }
        $status = "Canceled";

        return view('doctor.appointments', compact('status'));
    }

    public function datatable($status)
    {
        $id = Auth::guard('doctor')->user()->id;
        return DataTables::of(Appointment::where('doctor_id', $id)->where('status', $status)->with(['doctor', 'patient', 'availability']))
            ->addColumn('doctor', '{{$doctor["name"]}}')
            ->addColumn('patient', '{{$patient["name"]}}')
            ->addColumn('weekday', '{{$availability["weekday"]}}')
            ->addColumn('action', '
                <div class="btn-group btn-group-sm" role="group">
                    <button class="btn btn-primary btn-sm" title="View" onclick="view({{$id}})">
                        <i class="fas fa-eye"></i>
                    </button>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Change Status
                        </button>
                        <div class="dropdown-menu">
                            <button class="dropdown-item" onclick="changeStatus({{$id}}, \'pending\')">Pending</button>
                            <button class="dropdown-item" onclick="changeStatus({{$id}}, \'approved\')">Approve</button>
                            <button class="dropdown-item" onclick="changeStatus({{$id}}, \'completed\')">Complete</button>
                            <button class="dropdown-item" onclick="changeStatus({{$id}}, \'canceled\')">Cancel</button>
                        </div>
                    </div>
                </div>
            ')
            ->rawColumns(['doctor', 'patient', 'weekday', 'action'])
            ->make(true);
    }

    public function detail(Request $request, $id)
    {
        $appointment = Appointment::where('id', $id)->with(['doctor', 'patient', 'availability', 'availability.office'])->first();

        return $appointment;
    }

    public function changeStatus(Request $request)
    {
        $appointment = Appointment::find($request->id);

        if ($appointment) {
            $appointment->status = $request->status;
            $appointment->save();
            return response()->json(['message' => "Status has been updated"], 200);
        }

        return response()->json(['message' => "Something went wrong! Try again"], 500);
    }
}
