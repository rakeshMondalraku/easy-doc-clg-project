<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert([
            'name' => 'Rakesh Mondal',
            'age' => 32,
            'gender' => 'male',
            'qualification' => 'MBBS,MD,BDS',
            'specialization' => 'Child specialist',
            'experience' => '5 years',
            'mobile' => '8735462435',
            'email' => 'dr.rakesh@gmail.com',
            'password' => Hash::make('password'),
            'clinic_address' => 'Barrackpore',
            'clinic_timing' => '',
            'certificate' => '',
            'img' => '',
        ]);
    }
}
