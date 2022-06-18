<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class course_studentsseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <=10; $i++) {
        DB::table('course_students')->insert(
            [
                'course_id'=>rand(35,50),
                'student_id'=>rand(1,50),
                'created_at'=>now(),
                'updated_at'=>now(),

            ]

        );
        //
    }
    }
}
