<?php

use Illuminate\Database\Seeder;
use App\Tesimonial;
class tesimonialseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <=10; $i++) {
            Tesimonial::create(
                [
                    'name'=>'laravel vergion'.rand(0,9),
                    'desc'=>'descghjgfhgfhgfhfhdfhdsedxcghgtfhehewruiewhgegdshjds fusdfhsdhfdshffsd dsdfusdauifdnfhdsfdshifadsiud fsd'.rand(9999999999,99999999999),
                    'img'=>rand(1,9).'.png'

                ]
            );
        } //
    }
}
