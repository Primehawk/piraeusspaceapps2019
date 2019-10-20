<?php

use Illuminate\Database\Seeder;

class Uplinks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $Nodes = \App\Nodes::all();

        foreach ($Nodes as $Node) {
            for ($x = 0; $x <= 5; $x++) {
                $faker = Faker\Factory::create();
                $request = new \Illuminate\Http\Request();
                $request->merge([
                    'node_id' => $Node->id,
                    'h2' => $faker->numberBetween(0, 10),
                    'lgp' => $faker->numberBetween(0, 15),
                    'ch4' => $faker->numberBetween(0, 20),
                    'alcohol' => $faker->numberBetween(0, 10),
                    'air' => $faker->numberBetween(0, 16),
                    'o3' => $faker->numberBetween(0, 12),
                    'no2' => $faker->numberBetween(0, 17),
                    'so2' => $faker->numberBetween(0, 12),
                    'co' => $faker->numberBetween(0, 19),
                    'temp' => $faker->numberBetween(25, 40),
                    'aqi' => $faker->numberBetween(0, 300),
                    'battery' => $faker->numberBetween(0, 100),
                    'created_at' => $faker->dateTime(),
                    'captured_at' => $faker->dateTime(),
                ]);
                \App\Uplinks::create($request);
            }
        }

    }
}
