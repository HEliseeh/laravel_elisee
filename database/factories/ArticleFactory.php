<?php

namespace Database\Factories;
use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ArticleFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(15),
            'body' => $this->faker->paragraph(200),
            'user_id' =>function() {
                return User::inRandomOrder()->first()->id;
            },
            'image' => $this->faker->image('public/images'),
        ];
    }
}
