<?php

use Illuminate\Database\Seeder;
use App\Trainer;

class Trainerseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <=10; $i++) {
            Trainer::create(
                [
                    'name'=>'magdy '.rand(0,9),
                    'phone'=>rand(9999999999,99999999999),
                    'specialty'=>rand(1,9).'php',
                    'img'=>rand(1,9).'.png'

                ]
            );
        }


        //
    }
}
