<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->integer('forks');
          $table->string('full_name',100);
          $table->text('geotags');
          $table->string('gif_path',100);
          $table->boolean('gif_success');
          $table->string('homepage',100);
          $table->boolean('homepage_exist');
          $table->string('html_url',100);
          $table->string('pushed_at',100);
          $table->string('reponame',100);
          $table->text('skills');
          $table->integer('stargazers_count');
          $table->string('username',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}
