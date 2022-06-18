<?php

use Illuminate\Database\Seeder;
use App\Cat;
class catseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <=10; $i++) {
            Cat::create(
                [
                    'name'=>'magdy '.rand(0,9),


                ]
            );
        }
        //
    }
}
