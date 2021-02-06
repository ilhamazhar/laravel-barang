<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Barang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode' => $this->faker->unique()->numerify('KD###'),
            'nama' => $nama = $this->faker->name(),
            'slug' => Str::slug($nama),
            'kuantitas' => $this->faker->unique()->numberBetween(8, 55),
            'harga' => $this->faker->unique()->randomNumber(5),
        ];
    }
}
