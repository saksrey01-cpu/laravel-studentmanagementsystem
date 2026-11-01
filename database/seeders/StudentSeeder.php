<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::create([
            'student_name' => 'Srey Sak',
            'gender' => 'Male',
            'dob' => '2002-05-15',
            'enrollment' => 'CS2024001',
            'enrollment_date' => '2024-09-01',
            'description' => 'Excellent student',
            'dept_id' => 1
        ]);

        Student::create([
            'student_name' => 'Srey Sitharo',
            'gender' => 'Male',
            'dob' => '2003-08-22',
            'enrollment' => 'BA2024002',
            'enrollment_date' => '2024-09-01',
            'description' => 'Very active',
            'dept_id' => 2
        ]);

        Student::create([
            'student_name' => 'Srey Sovanrith',
            'gender' => 'Male',
            'dob' => '2001-11-10',
            'enrollment' => 'EN2024003',
            'enrollment_date' => '2024-09-01',
            'description' => null,
            'dept_id' => 3
        ]);
    }
}