<?php

use App\Models\Category;
use App\Models\Like;
use App\Models\Post;
use Faker\Factory;

class DummyDataTest extends TestCase {

	public function testDummyPosts()
	{
		$faker = Factory::create();
		DB::table('posts')->delete();

        $data = [];

        foreach (range(1, 100) as $number) {
            $data[] = [
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'body' => $faker->paragraph,
                'outstanding' => $faker->boolean,
                'image' => $faker->word,
            ];
        }

        DB::table('posts')->insert($data);
	}

	public function testRelateCategoryPost()
	{
	    $posts = Post::all();
	    $categories = Category::all();

	    $posts->each(function($post) use ($categories) {
	    	$randomCategories = collect($categories->lists('id'))->random(2);
			$post->categories()->sync($randomCategories);
	    });
	}

    public function testLikeSomePosts()
    {
        $posts = Post::all();

        $posts->each(function($post) {
            $bool = mt_rand(0, 1);

            if ($bool) {
                $likes = mt_rand(1, 10);

                foreach (range(1, $likes) as $like) {
                    $post->likes()->save(new Like);
                }
            }
        });
    }

}