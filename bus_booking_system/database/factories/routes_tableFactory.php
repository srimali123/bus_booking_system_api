<?php

namespace Database\Factories;

use App\Models\routes_table;
use Illuminate\Database\Eloquent\Factories\Factory;

class routes_tableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = routes_table::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'node_one'=>$this ->faker->city,
            'node_two'=>$this ->faker->city,
            'route_number'=>$this->faker->buildingNumber(2),
            'distance'=>$this->faker->numberBetween(1,100),
            'time'=>$this ->faker->numberBetween(2,100),

        ];
    }
}
