<?php

namespace Database\Factories;

use App\Models\Operation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class OperationFactory extends Factory
{

    protected $model = Operation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_cliente' => '1',
            'pilot_id' => '1',
            'assistant_id_one' => '1',
            'date_operation' => '2024-02-28',
        ];
    }

}
