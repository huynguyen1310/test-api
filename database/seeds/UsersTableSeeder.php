<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(User::class, 10)->create()->each(function ($user) {
        //     $user->posts()->save(factory(Post::class)->make());
        //     $user->comments()->save(factory(Comment::class)->make());
        // });

        factory(User::class)->create();
    }
}
