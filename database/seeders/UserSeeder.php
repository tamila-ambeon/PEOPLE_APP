<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Container\Container;
use DB;

use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
     protected $faker;

     /**
      * Create a new seeder instance.
      *
      * @return void
      */
     public function __construct()
     {
         $this->faker = $this->withFaker();
     }
 
     /**
      * Get a new Faker instance.
      *
      * @return \Faker\Generator
      */
     protected function withFaker()
     {
         return Container::getInstance()->make(Generator::class);
     }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        for($i = 0; $i <= 10; $i++) {
            $gender = $this->faker->randomElement([0, 1]);

            DB::table('people')->insert([
                'name' => $this->faker->firstName($gender),
                'surname' => $this->faker->lastName($gender) ,
                'middlename' => $this->faker->middleName($gender),
                'gender' => $gender,
            ]);
        }
    }
}
