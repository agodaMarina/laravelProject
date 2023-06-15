<?php

namespace Database\Factories;

use App\Models\etudiant;
use Illuminate\Database\Eloquent\Factories\Factory;

class etudiantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = etudiant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->word,
        'prenom' => $this->faker->word,
        'age' => $this->faker->randomDigitNotNull,
        'contact' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'filiere' => $this->faker->randomDigitNotNull
        ];
    }
}
