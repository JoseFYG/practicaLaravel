<?php

namespace Database\Factories;

use App\Models\Asignatura;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Profesor;

class AsignaturaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asignatura::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $profesores=Profesor::all('id');
        return [
            'nombre'=>$this->faker->unique()->firstName(),
            'descripcion'=>$this->faker->text($maxNbChars = 200),
            'creditos'=>$this->faker->randomDigit(),
            'id_profesor'=>$profesores->get(rand(0, count($profesores)-1))
        ];
    }
}
