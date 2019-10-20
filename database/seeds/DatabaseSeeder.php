<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        Auth::login($user);
        $this->call(Nodes::class);
        $this->call(Uplinks::class);
    }
}
