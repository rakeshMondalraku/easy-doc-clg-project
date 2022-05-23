<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class AdminDoctorController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(Doctor::with('specialization'))
                ->addColumn('specialization', '{{$specialization["name"]}}')
                ->editColumn('mobile', '<a href="tel:{{$mobile}}">{{$mobile}}</a>')
                ->editColumn('email', '<a href="mailto:{{$email}}">{{$email}}</a>')
                ->addColumn('action', '
                    <a href="{{route(\'admin.doctors.edit\', $id)}}" class="btn btn-primary btn-circle btn-sm" title="Edit" onclick="edit({{$id}})">
                        <i class="fas fa-pen"></i>
                    </a>
                ')
                ->rawColumns(['specialization', 'mobile', 'email', 'action'])
                ->make(true);
        }

        return view('admin.doctors');
    }

    public function edit(Request $request, Doctor $doctor)
    {
        $specializations = Specialization::all();
        return view('admin.doctor.edit', compact('doctor', 'specializations'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('doctors')->ignore($doctor->id)],
        ]);

        $request->validate([
            'name' => ['required'],
            'age' => ['required', 'integer'],
            'gender' => ['required'],
            'qualification' => ['required'],
            'specialization' => ['required'],
            'experience' => ['required'],
            'email' => ['required', 'email', Rule::unique('doctors')->ignore($doctor->id)],
            'mobile' => ['required', Rule::unique('doctors')->ignore($doctor->id)],
            'registration_number' => ['required', Rule::unique('doctors')->ignore($doctor->id)]
        ]);

        $doctor->name = $request->name;
        $doctor->age = $request->age;
        $doctor->gender = $request->gender;
        $doctor->qualification = $request->qualification;
        $doctor->specialization_id = $request->specialization;
        $doctor->experience = $request->experience;
        $doctor->email = $request->email;
        $doctor->mobile = $request->mobile;
        $doctor->registration_number = $request->registration_number;

        if ($request->file('picture')) {
            if ($doctor->picture) {
                Storage::delete('public/' . str_replace('storage/', '', $doctor->picture));
            }
            $doctor->picture = 'storage/doctors/' . explode('/', $request->file('picture')->store('public/doctors'))[2];
        }

        if ($doctor->save()) {
            return redirect()->back()->withSuccess(['Doctor has been updated!']);
        } else {
            return redirect()->back()->withErrors(['Something went wrong! Try again']);
        }
    }
}
