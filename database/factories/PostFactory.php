<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $excerptText =  $this->faker->paragraphs(2);
        $bodyText = $this->faker->paragraphs(6);

        $excerptHtml = '';
        $bodyHtml = '';

        foreach ($excerptText as $value) {
            $excerptHtml .= "<p>$value</p>";
        }

        foreach ($bodyText as $value) {
            $bodyHtml .= "<p>$value</p>";
        }

        return array(
            'category_id'=> Category::factory(),
            'user_id'=> User::factory(),
            "slug" => $this->faker->unique()->slug,
            'title'=> $this->faker->sentence,
            'excerpt'=> $excerptHtml,
            'body'=> $bodyHtml,
        );
    }
}
