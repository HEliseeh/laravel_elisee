<?php

namespace Database\Factories;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentFactory extends Factory
{
    
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment' => $this->faker->text(50),
            'user_id' => function() {
                return User::inRandomOrder()->first()->id;
            },
            'article_id' => function() {
                return Article::inRandomOrder()->first()->id;
            },
        ];
    }
}
