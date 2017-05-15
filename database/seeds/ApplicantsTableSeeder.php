<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ApplicantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        
        foreach(range(1,300) as $index){
          DB::table('applicants')->insert([
            'first_name' => $faker->firstName,
            'middle_name' => $faker->firstName,
            'first_surname' => $faker->lastName,
            'second_surname' => $faker->lastName,
            'birth_date' => $faker->date,
            'document' => $faker->numberBetween(100,400),//making sure of redundancy
            'home_phone' => $faker->phoneNumber,
            'mobile_phone' => $faker->phoneNumber,
            'email' => $faker->safeEmail,
            'workshop_name' => $faker->randomElement(
              $array=array('Angular2','Laravel','VueJs')
            ),
            'status' => 'pending',
            'created_at' => $faker->dateTimeThisYear($max='now'),
            'updated_at' => $faker->dateTimeThisMonth($max='now'), 
          ]);
        }
    }
}
