<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Availability;
use App\Models\Office;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class DoctorOfficeController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(Office::where('doctor_id', Auth::guard('doctor')->user()->id))
                ->addColumn('action', '
                    <button class="btn btn-primary btn-circle btn-sm" title="Edit" onclick="edit({{$id}})">
                        <i class="fas fa-pen"></i>
                    </button>
                    <button class="btn btn-danger btn-circle btn-sm" title="Delete" onclick="remove({{$id}})">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                ')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('doctor.offices');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fee' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'zip' => ['required'],
        ]);

        $office = new Office();
        $office->doctor_id = Auth::guard('doctor')->user()->id;
        $office->fee = $request->fee;
        $office->address = $request->address;
        $office->city = $request->city;
        $office->state = $request->state;
        $office->zip = $request->zip;
        $office->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $office->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        if ($office->save()) {
            return response()->json(['message' => "New Office has been added"], 200);
        }

        return response()->json(['message' => "Something went wrong! Try again"], 500);
    }

    public function edit(Office $office)
    {
        return $office;
    }

    public function update(Request $request, Office $office)
    {
        $request->validate([
            'fee' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'zip' => ['required'],
        ]);

        $office->fee = $request->fee;
        $office->address = $request->address;
        $office->city = $request->city;
        $office->state = $request->state;
        $office->zip = $request->zip;
        $office->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        if ($office->save()) {
            return response()->json(['message' => "Office has been updated"], 200);
        }

        return response()->json(['message' => "Something went wrong! Try again"], 500);
    }

    public function destroy(Office $office)
    {
        if ($office->delete()) {
            Availability::where('office_id', $office->id)->delete();
            return response()->json(['message' => "Office has been deleted"], 200);
        }

        return response()->json(['message' => "Something went wrong! Try again"], 500);
    }
}
