<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Mehmet Akgül',
            'email' => 'admin@admin',
            'email_verified_at' => now(),
            'password' => '$2y$10$pY8YFS6InxRNysIrhYEZG.PBe40y4igag/RogpWHDWxKEdRO5nDNK', // password 1
            'remember_token' => Str::random(10),
        ];
    }
}
