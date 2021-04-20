<?php

namespace Database\Factories;

use App\Models\Pass;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pass::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->password,
            'user_id' => $this->faker->numberBetween($min = 1, $max = 4),
            'category_id' => $this->faker->numberBetween($min = 1, $max = 9),
            'private' =>  $this->faker->numberBetween($min = 1, $max = 2),
            'source' =>  $this->faker->domainName,
            
        ];
    }
}
