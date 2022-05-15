<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Anatomical Pathology', 'Anesthesiology', 'Cardiology', 'Cardiovascular/Thoracic Surgery', 'Clinical Immunology/Allergy', 'Critical Care Medicine', 'Dermatology', 'Diagnostic Radiology', 'Emergency Medicine', 'Endocrinology and Metabolism', 'Family Medicine', 'Gastroenterology', 'General Internal Medicine', 'General Surgery', 'General/Clinical Pathology', 'Geriatric Medicine', 'Hematology', 'Medical Biochemistry', 'Medical Genetics', 'Medical Microbiology and Infectious Diseases', 'Medical Oncology', 'Nephrology', 'Neurology', 'Neurosurgery', 'Nuclear Medicine', 'Obstetrics/Gynecology', 'Occupational Medicine', 'Ophthalmology', 'Orthopedic Surgery', 'Otolaryngology', 'Pediatrics', 'Physical Medicine and Rehabilitation (PM & R)', 'Plastic Surgery', 'Psychiatry', 'Public Health and Preventive Medicine (PhPm)', 'Radiation Oncology', 'Respirology', 'Rheumatology', 'Urology'];

        foreach ($data as $name) {
            DB::table('specializations')->insert([
                'name' => $name,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
