<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            'name' => 'Subhojit Ghosh',
            'age' => 21,
            'gender' => 'male',
            'mobile' => '8735462435',
            'email' => 'subhojit@gmail.com',
            'password' => Hash::make('password'),
            'address' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('patients')->insert([
            'name' => 'Rohit Gupta',
            'age' => 22,
            'gender' => 'male',
            'mobile' => '7365221324',
            'email' => 'rohit@gmail.com',
            'password' => Hash::make('password'),
            'address' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
