<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class Nodes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($x = 0; $x <= 5; $x++) {
            $request = new \Illuminate\Http\Request();
            $request->merge([
                'name' => $faker->firstName,
                'owner_id' => Auth::user()->id,
                'longitude' => $faker->longitude(20.987684, 25.406557),
                'latitude' => $faker->latitude(37.940880, 41.122440),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            \App\Nodes::create($request);
        }
    }
}
