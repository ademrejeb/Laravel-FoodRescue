<?php

namespace Database\Factories;

use App\Models\Contribution;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contribution>
 */
class ContributionFactory extends Factory
{
    protected $model = Contribution::class;

    public function definition()
    {
        return [
            'montant' => $this->faker->numberBetween(100, 10000),
            'type_contribution' => $this->faker->randomElement(['financier', 'matériel', 'service']),
            'campagne_id' => \App\Models\Campagne::factory(),  // Lien avec une campagne existante
            'donateur_id' => \App\Models\Donator::factory(),
        ];
    }
}