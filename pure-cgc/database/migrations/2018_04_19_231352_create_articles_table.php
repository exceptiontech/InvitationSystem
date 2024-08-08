<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->default(0);
            $table->integer('category_id')->default(0)->references('id')->on('categories')->onDelete('cascade');
            $table->integer('ord')->default(0);
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->string('auther',45)->nullable();
            $table->text('img')->nullable();
            $table->string('img_thumbnail',150)->nullable();
            $table->string('url_link',300)->nullable();
            $table->string('brief',2000)->nullable();
            $table->string('brief_en',2000)->nullable();
            $table->text('details')->nullable();
            $table->text('details_en')->nullable();
            $table->integer('num_views')->default(0);
            $table->boolean('is_active')->default(1);
            $table->softDeletes();
            $table->timestamps();
            $table->string('user_ip',15)->nullable();
            $table->string('user_pc_info',230)->nullable();
            $table->integer('user_added')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
