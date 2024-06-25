<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $technologiesArray = ['html', 'css', 'Bootstrap', 'JavaScript', 'vite', 'php', 'MySQL', 'laravel'];

        foreach ($technologiesArray as $technology) {

            $newTechnology = new Technology();

            $newTechnology->name = $technology;
            $newTechnology->slug = Str::slug($technology);
            $newTechnology->color = $faker->colorName();
            $newTechnology->description = $faker->paragraph(3);

            $newTechnology->save();
        }
    }
}
