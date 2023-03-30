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
        // LazyCollection::make(function () {
        //   $handle = fopen(public_path("data.csv"), 'r');
          
        //   while (($line = fgetcsv($handle, 4096)) !== false) {
        //     $dataString = implode(", ", $line);
        //     $row = explode(';', $dataString);
        //     yield $row;
        //   }
    
        //   fclose($handle);
        // })
        // ->skip(1)
        // ->chunk(1000)
        // ->each(function (LazyCollection $chunk) {
        //   $records = $chunk->map(function ($row) {
        //     return [
        //         "name" => $row[0],
        //         "email" => $row[1],
        //         "address" => $row[2],
        //         "study_course" => $row[3],
        //     ];
        //   })->toArray();
          
        //   DB::table('student_api')->insert($records);
        // });


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
