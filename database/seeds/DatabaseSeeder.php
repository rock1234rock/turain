<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_type')->insert(['typename' => 'customer',]);
        DB::table('user_type')->insert(['typename' => 'admin',]);
        DB::table('user_type')->insert(['typename' => 'supplier',]);

        $this->call([
            UsersTableSeeder::class,
            CitySeeder::class,
        ]);
    }

}
