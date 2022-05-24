<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enrollments')->insert([
            'course_id'=>'1',
            'student_id'=>'5',
            'fecha'=>'2022/05/23',
            'status'=>'En espera'
        ]);

        DB::table('enrollments')->insert([
            'course_id'=>'1',
            'student_id'=>'6',
            'fecha'=>'2022/05/23',
            'status'=>'Aceptada'
        ]);

        DB::table('enrollments')->insert([
            'course_id'=>'2',
            'student_id'=>'5',
            'fecha'=>'2022/05/23',
            'status'=>'En espera'
        ]);

        DB::table('enrollments')->insert([
            'course_id'=>'2',
            'student_id'=>'6',
            'fecha'=>'2022/05/23',
            'status'=>'Aceptada'
        ]);
    }
}
