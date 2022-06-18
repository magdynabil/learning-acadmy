<?php

use Illuminate\Database\Seeder;
use App\Student;
class studentseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* for ($i = 0; $i <=10; $i++) {
           Student::create(
                [
                    'name'=>'magdy '.rand(0,9),
                    'email'=>'magdy '.rand(999,9999).'@gmail.com',
                    'phone'=>rand(9999999999,99999999999),
                    'specialty'=>'php'.rand(1,9)

                ]
            );
        }*/
        factory(Student::class,40)->create();
        //
    }
}
