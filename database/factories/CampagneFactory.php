<?php

namespace Database\Factories;
use App\Models\Campagne;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campagne>
 */
class CampagneFactory extends Factory
{
    protected $model = Campagne::class;

    public function definition()
    {
        return [
            'titre' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'date_debut' => $this->faker->date(),
            'date_fin' => $this->faker->date(),
            'budget' => $this->faker->numberBetween(1000, 10000),
        ];
    }
}