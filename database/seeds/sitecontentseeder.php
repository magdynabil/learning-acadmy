<?php

use Illuminate\Database\Seeder;
use App\Sitecontent;
class sitecontentseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sitecontent::create(
            [
                //'name'=>'banner',
               // 'content'=> json_encode(
                   // [
                      //  'title'=>'EVERY student YEARNS TO LEARN',
                      //  'sub_title'=>'Making Your students World Better',
                      //  'description'=>'Replenish seasons may male hath fruit beast were seas saw you arrie said man beast whales his void unto last session for bite. Set have great you\'ll male grass yielding yielding man'
                'name'=>'Feature',
                'content'=>json_encode([
                    'main_title'=>'AwesomeFeature',
                    'main_description'=>'Set have great you male grass yielding an yielding first their you\'re have called the abundantly fruit were man',
                    'section_1_title'=>'Better Future',
                    'section_1_description'=>'Set have great you male grasses yielding yielding first their to called deep abundantly Set have great you male',
                    'section_2_title'=>'Qualified Trainers',
                    'section_2_description'=>'Set have great you male grasses yielding yielding first their to called deep abundantly Set have great you male',
                    'section_3_title'=>'Job Oppurtunity',
                    'section_3_description'=>'Set have great you male grasses yielding yielding first their to called deep abundantly Set have great you male',
                ])
            ]


        );
    }
}
