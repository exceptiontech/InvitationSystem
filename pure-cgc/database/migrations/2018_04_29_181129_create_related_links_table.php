<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatedLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('related_links', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->default(0);
            $table->integer('ord')->default(0);
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->string('img',300)->nullable();
            $table->text('url_link')->nullable();
            $table->text('details')->nullable();
            $table->text('details_en')->nullable();
            $table->enum('is_active',['Y','N'])->default('Y');
            $table->softDeletes('deleted_at', 0);
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
        Schema::dropIfExists('related_links');
    }
}
