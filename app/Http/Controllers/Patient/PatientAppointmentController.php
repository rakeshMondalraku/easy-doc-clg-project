<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class PatientAppointmentController extends Controller
{
	public function doctorInfo(Request $request, $id)
	{
		$doctor = Doctor::where('id', $id)->with(['specialization', 'availabilities', 'availabilities.office'])->first();

		return $doctor;
	}
}
