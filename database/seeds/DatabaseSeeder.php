<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
    * Seed the application's database.
    *
    * @return void
    */
    public function run()
    {
        {  factory(User::class, 1 )->create()->each(function($u) {
            $u->questions()
            ->saveMany(
                factory(Post::class, rand(5, 10))->make()
            );
        });

    }
}
}
