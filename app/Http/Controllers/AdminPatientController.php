<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminPatientController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(Patient::all())
                ->editColumn('mobile', '<a href="tel:{{$mobile}}">{{$mobile}}</a>')
                ->editColumn('email', '<a href="mailto:{{$email}}">{{$email}}</a>')
                ->rawColumns(['mobile', 'email'])
                ->make(true);
        }
        return view('admin.patients');
    }
}
