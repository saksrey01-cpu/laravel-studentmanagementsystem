<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Department::create(['dept_name' => 'Computer Science', 'manager_id' => 1, 'location_id' => 1]);
        Department::create(['dept_name' => 'Business Administration', 'manager_id' => 2, 'location_id' => 2]);
        Department::create(['dept_name' => 'Engineering', 'manager_id' => 3, 'location_id' => 1]);
        Department::create(['dept_name' => 'Arts & Design', 'manager_id' => 4, 'location_id' => 3]);
    }
}