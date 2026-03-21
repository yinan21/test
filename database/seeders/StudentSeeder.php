<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::insert([
        ['name' => 'Alice Smith', 'course' => 'Medicine', 'year' => 2],
        ['name' => 'Bob Jones', 'course' => 'Dentistry', 'year' => 3],
        ['name' => 'Charlie Brown', 'course' => 'Medicine', 'year' => 1],
        ['name' => 'Diana Prince', 'course' => 'Pharmacy', 'year' => 4],
    ]);
    }
}
