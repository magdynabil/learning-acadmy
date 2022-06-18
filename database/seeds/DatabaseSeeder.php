<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //$this->call(catseeder::class);
         //$this->call(Trainerseeder::class);
         //$this->call(studentseeder::class);
         //$this->call(course_studentsseeder::class);
         $this->call(sitecontentseeder::class);
         //$this->call(tesimonialseed::class);
         //$this->call(coursesseeder::class);
    }
}
