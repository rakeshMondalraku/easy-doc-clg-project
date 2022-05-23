<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class AdminPatientController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(Patient::all())
                ->editColumn('mobile', '<a href="tel:{{$mobile}}">{{$mobile}}</a>')
                ->editColumn('email', '<a href="mailto:{{$email}}">{{$email}}</a>')
                ->addColumn('action', '
                    <a href="{{route(\'admin.patients.edit\', $id)}}" class="btn btn-primary btn-circle btn-sm" title="Edit" onclick="edit({{$id}})">
                        <i class="fas fa-pen"></i>
                    </a>
                ')
                ->rawColumns(['mobile', 'email', 'action'])
                ->make(true);
        }
        return view('admin.patients');
    }

    public function edit(Request $request, Patient $patient)
    {
        return view('admin.patient.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => ['required'],
            'age' => ['required'],
            'gender' => ['required'],
            'mobile' => ['required'],
            'email' => ['required', 'email', Rule::unique('admins')->ignore($patient->id)],
            'address' => ['required'],
        ]);

        $patient->name = $request->name;
        $patient->age = $request->age;
        $patient->gender = $request->gender;
        $patient->mobile = $request->mobile;
        $patient->email = $request->email;
        $patient->address = $request->address;

        if ($patient->save()) {
            return redirect()->back()->withSuccess(['Patient has been updated!']);
        } else {
            return redirect()->back()->withErrors(['Something went wrong! Try again']);
        }
    }
}
