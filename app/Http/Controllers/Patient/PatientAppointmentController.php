<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientAppointmentController extends Controller
{
	public function doctorInfo(Request $request, $id)
	{
		$doctor = Doctor::where('id', $id)->with(['specialization', 'availabilities', 'availabilities.office'])->first();

		return $doctor;
	}

	public function create(Request $request)
	{
		$request->validate([
			'doctor' => ['required'],
			'availability' => ['required'],
		]);

		$appointment = new Appointment;
		$appointment->patient_id = Auth::guard('patient')->user()->id;
		$appointment->doctor_id = $request->doctor;
		$appointment->availability_id = $request->availability;
		$appointment->status = 'pending';

		if ($appointment->save()) {
			return response()->json(['message' => 'Your appointment has been booked'], 200);
		} else {
			return response()->json(['message' => 'Something went wrong! Try again'], 400);
		}
	}
}
