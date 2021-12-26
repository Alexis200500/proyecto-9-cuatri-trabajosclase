<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create();
        $gender = $faker->randomElement(['male','female']);
        foreach (range(1,100) as $index){
            DB::table('odontologos')->insert([
                //nombre => $faker->name($gender),
                'nombre' => $faker->firstName($gender = 'male'|'female'),
                'appaterno' => $faker->lastName,
                'apmaterno' => $faker->lastName,
                'sexo' => $faker->randomElement($array = array('F', 'M')),
                'edad' => $faker->numberBetween($min = 1, $max = 99),
                'telefono' => $faker->numberBetween($min = 2110000000, $max = 2210000000),
                'correo' =>$faker->email,
                'password'=> $faker->bothify('utvt##??'), 
                'calle' => $faker->firstName($gender = 'male'|'female'),
                'numint' => $faker->numberBetween($min = 1, $max = 1000),
                'numext' => $faker->numberBetween($min = 1, $max = 1000),
                'idmun' => 1,
                'colonia' => $faker->firstName($gender = 'male'|'female'),
                'idesp' => 1,
                'img'=>'sinfoto.jpg',
                'hora_entrada'=>'00:00:00',
                'hora_salida'=>'00:00:00',
                'created_at'=> $faker->dateTime($max='now', $timezone=null),                   
                'updated_at'=> $faker->dateTime($max='now', $timezone=null),                   
            ]);
        }
    }
}
