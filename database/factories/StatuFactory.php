<?php

namespace Database\Factories;

use App\Models\Statu;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Statu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => 'disponible',
            'descripcion' => '1',
        ];
    }
}
