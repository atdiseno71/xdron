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
            // 'pilot_id ' => 2,
            'id_cliente' => random_int(2, 4),
            'admin_by' => random_int(2, 3),
            // 'status_id ' => random_int(2, 4),
            'created_at' => now(),
        ];
    }

}
