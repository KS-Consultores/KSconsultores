<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTablePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

            $table->increments('id');

            $table->string('title');
            $table->string('description');
            $table->text('body');
            $table->string('image');
            $table->boolean('outstanding')->default(0);
            $table->boolean('active')->default(true);
            
            $table->timestamps();
            
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}