<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->default(0);
            $table->integer('parent_id')->default(0);
            $table->integer('ord')->default(0);
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->text('img')->nullable();
            $table->string('img_thumbnail',150)->nullable();
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
        Schema::dropIfExists('galleries');
    }
}
