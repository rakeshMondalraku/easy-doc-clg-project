<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\Rule;

class AdminSpecializationController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(Specialization::all())
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
        return view('admin.specializations');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', Rule::unique('specializations')],
        ]);

        $specialization = new Specialization;
        $specialization->name = $request->name;
        $specialization->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $specialization->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        if ($specialization->save()) {
            return response()->json(['message' => "New specialization has been added"], 200);
        }

        return response()->json(['message' => "Something went wrong! Try again"], 500);
    }

    public function edit(Specialization $specialization)
    {
        return $specialization;
    }

    public function update(Request $request, Specialization $specialization)
    {
        $request->validate([
            'name' => ['required', Rule::unique('specializations')->ignore($specialization->id)],
        ]);

        $specialization->name = $request->name;
        $specialization->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        if ($specialization->save()) {
            return response()->json(['message' => "Specialization has been updated"], 200);
        }

        return response()->json(['message' => "Something went wrong! Try again"], 500);
    }

    public function destroy(Specialization $specialization)
    {
        if ($specialization->delete()) {
            return response()->json(['message' => "Specialization has been deleted"], 200);
        }

        return response()->json(['message' => "Something went wrong! Try again"], 500);
    }
}
