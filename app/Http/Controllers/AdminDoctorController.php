<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminDoctorController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(Doctor::all())
                ->editColumn('mobile', '<a href="tel:{{$mobile}}">{{$mobile}}</a>')
                ->editColumn('email', '<a href="mailto:{{$email}}">{{$email}}</a>')
                ->rawColumns(['mobile', 'email'])
                ->make(true);
        }

        return view('admin.doctors');
    }
}
