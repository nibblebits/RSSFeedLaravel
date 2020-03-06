<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 30)->create(['account_type' => 'employer'])->each(function ($u) {
            $random = rand(1, 20);
            for ($i = 0; $i < $random; $i++)
            {
                $u->createdJobs()->save(factory(App\Job::class)->make());
            }
        });
    }
}
