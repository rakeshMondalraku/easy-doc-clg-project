<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Query;
use Yajra\DataTables\DataTables;

class AdminQueryController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(Query::all())->make(true);
        }

        return view('admin.queries');
    }
}
