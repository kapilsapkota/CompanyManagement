<?php

namespace Database\Seeders;

use App\Models\Company;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CompanySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::factory(10)->create()->each(function ($company) {
            $image = Image::canvas(100, 100, fake()->hexColor());
            $filename = 'logo_' . $company->id . '.png';
            $imagePath = 'public/'. $filename;
            Storage::put($imagePath, $image->encode('png'));
            $company->update(['logo' => $filename]);
        });
    }
}
