<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        DB::table('media')->insert([
            ['name' => 'twitter'],
            ['name' => 'reddit'],
            ['name' => 'mastodon'],
        ]);
        DB::table('typepost')->insert([
            ['name' => 'instant'],
            ['name' => 'queued'],
            ['name' => 'scheduled'],
        ]);
    }
}
