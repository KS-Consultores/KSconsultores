<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Post;

class AddFieldDateToPosts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('posts', function($table){
           $table->date('date')->after("outstanding");
        });

     	$posts = Post::all();

       	foreach ($posts as $post) {
       		$post->date = $post->created_at;
       		$post->save();
       	}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('posts', function($table){
           $table->dropColumn('date');
        });
	}

}
