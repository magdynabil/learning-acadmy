<?php

use Illuminate\Database\Seeder;
use App\Course;
class coursesseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <=10; $i++) {
            Course::create(
                [
                    'name'=>'laravel vergion'.rand(0,9),
                    'small_desc'=>'small_desc '.rand(0,9),
                    'desc'=>'desc'.rand(9999999999,99999999999),
                    'price'=>rand(999,99999),
                    'cat_id'=>rand(1,9),
                    'trainer_id'=>rand(1,9),
                    'img'=>rand(1,9).'.png'

                ]
            );
        }
        //
    }
}
