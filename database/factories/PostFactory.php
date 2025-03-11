<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Random\RandomException
     */
    public function definition(): array
    {
        $title = $this->faker->realText(30);
        $isPublished = $this->faker->boolean(70);

        return [
            'user_id' => User::factory(),
            'title' => $title,
            'content' => $this->faker->realText(),
            'excerpt' => $this->faker->paragraph(),
            'featured_image' => $this->faker->imageUrl(1200, 630),
            'is_published' => $isPublished,
            'published_at' => $isPublished ? $this->faker->dateTimeBetween('-1 year', 'now') : null,
            'created_at' => $this->faker->dateTimeBetween('-2 years', '-1 day'),
            'updated_at' => $this->faker->dateTimeBetween('-1 day', 'now'),
        ];
    }

    /**
     * 게시된 포스트 상태를 정의합니다.
     *
     * @return $this
     */
    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_published' => true,
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ]);
    }

    /**
     * 게시되지 않은 포스트 상태를 정의합니다.
     *
     * @return $this
     */
    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_published' => false,
            'published_at' => null,
        ]);
    }

    /**
     * 특정 사용자에 속한 포스트 상태를 정의합니다.
     *
     * @param  int  $userId
     * @return $this
     */
    public function forUser(int $userId): static
    {
        return $this->state(fn (array $attributes) => [
            'user_id' => $userId,
        ]);
    }
}