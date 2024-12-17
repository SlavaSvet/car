<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Make;
use App\Models\Model;
use App\Models\TypeVihicle;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->seedTypeVihicles();
        $this->seedModels();
        $this->seedCars();
    }

    private function seedTypeVihicles(): void
    {
        $vehicles = [
            "Sedan",
            "SUV",
            "Hatchback",
            "Convertible",
            "Coupe",
            "Minivan",
            "Pickup Truck",
            "Sports Car",
            "Electric Car",
            "Hybrid Car",
            "Crossover",
            "Wagon",
            "Luxury Car",
            "Roadster",
            "Supercar"
        ];


        foreach ($vehicles as $vehicle) {
            TypeVihicle::create([
                "name" => $vehicle,
            ]);
        }
    }

    private function seedModels(): void
    {
        $modelData = $this->importFromFile('cars.json');

        foreach ($modelData as $carItem) {
            $make = Make::create(['name' => $carItem['name']]);

            foreach ($carItem['models'] as $modelItem) {
                Model::create([
                    'make_id' => $make->id,
                    'name' => $modelItem,
                ]);
            }
        }
    }

    private function seedCars(): void
    {
        $models = Model::all();

        foreach ($models as $model) {
            $car = Car::create([
                'model_id' => $model->id,
                'type_vihicle_id' => TypeVihicle::inRandomOrder()->first()->id,
                'name' => $model->name,
                'price' => rand(10000, 50000),
                'year' => rand(2010, 2022),
                'vin' => Str::random(17)
            ]);

            $carImage = 'car_'.rand(1, 1).'.jpg';
            $sourceFilePath = database_path('seeders/files/images/cars/'.$carImage);
            $this->handleMediaFile($sourceFilePath, $carImage, $car, 'image');
        }
    }

    private function importFromFile(string $filename): array
    {
        $path = database_path('seeders/files/'.$filename);
        $fileContent = file_get_contents($path);

        return json_decode($fileContent, true);
    }

    private function handleMediaFile(string $sourcePath, string $destinationPath, $model, string $mediaCollection): void
    {
        $tempDirectory = storage_path('app/tmp/');

        if (! File::exists($tempDirectory)) {
            File::makeDirectory($tempDirectory, 0755, true);
        }

        $tempFilePath = storage_path('app/tmp/'.basename($destinationPath));
        File::copy($sourcePath, $tempFilePath);

        $model->addMedia($tempFilePath)->toMediaCollection($mediaCollection);
    }
}
