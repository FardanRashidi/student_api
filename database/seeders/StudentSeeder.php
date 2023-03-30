<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;

class StudentSeeder extends Seeder
{
    public function run()
    {
        Student::truncate();
        $csvData = fopen(base_path('database/csv/data.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                Student::create([
                    'name' => $data['0'],
                    'email' => $data['1'],
                    'address' => $data['2'],
                    'study_course' => $data['3'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
      }
}
