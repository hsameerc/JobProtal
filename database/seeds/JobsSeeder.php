<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $faker = Faker::create();
        $skills = $faker->words($nb = 5, $asText = false);
        foreach (range(1, 5) as $index) {
            \App\Job::create([
                'title' => implode(" ", $faker->sentences()),
                'slug' =>  Str::slug(strtolower (implode(" ", $faker->sentences()))),
                'auth_id' => str_random(60) .$faker->freeEmail,
                'description' => $faker->paragraph(20),
                'user_email' => $faker->freeEmail,
                'skills'=>json_encode($skills),
            ]);
        }
        Model::reguard();
    }
}
