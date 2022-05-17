<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Availability;
use App\Models\Office;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class DoctorAvailabilityController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(Availability::where('availabilities.doctor_id', Auth::guard('doctor')->user()->id)->with('office'))
                ->addColumn('office', '{{$office["address"]}} - {{$office["city"]}} - {{$office["state"]}} - {{$office["zip"]}}')
                ->addColumn('action', '
                    <button class="btn btn-primary btn-circle btn-sm" title="Edit" onclick="edit({{$id}})">
                        <i class="fas fa-pen"></i>
                    </button>
                    <button class="btn btn-danger btn-circle btn-sm" title="Delete" onclick="remove({{$id}})">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                ')
                ->rawColumns(['office', 'action'])
                ->make(true);
        }

        $offices = Office::where('doctor_id', Auth::guard('doctor')->user()->id)->get();
        return view('doctor.availabilities', compact('offices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'office' => ['required', 'exists:offices,id'],
            'weekday' => ['required', Rule::in(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'])],
            'start' => ['required'],
            'end' => ['required'],
        ]);

        $availability = new Availability();
        $availability->doctor_id = Auth::guard('doctor')->user()->id;
        $availability->office_id = $request->office;
        $availability->weekday = $request->weekday;
        $availability->start = $request->start;
        $availability->end = $request->end;
        $availability->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $availability->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        if ($availability->save()) {
            return response()->json(['message' => "New Availability has been added"], 200);
        }

        return response()->json(['message' => "Something went wrong! Try again"], 500);
    }

    public function edit(Availability $availability)
    {
        return $availability;
    }

    public function update(Request $request, Availability $availability)
    {
        $request->validate([
            'office' => ['required', 'exists:offices,id'],
            'weekday' => ['required', Rule::in(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'])],
            'start' => ['required'],
            'end' => ['required'],
        ]);

        $availability->office_id = $request->office;
        $availability->weekday = $request->weekday;
        $availability->start = $request->start;
        $availability->end = $request->end;
        $availability->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        if ($availability->save()) {
            return response()->json(['message' => "Availability has been updated"], 200);
        }

        return response()->json(['message' => "Something went wrong! Try again"], 500);
    }

    public function destroy(Availability $availability)
    {
        if ($availability->delete()) {
            Availability::where('office_id', $availability->id)->delete();
            return response()->json(['message' => "Availability has been deleted"], 200);
        }

        return response()->json(['message' => "Something went wrong! Try again"], 500);
    }
}
