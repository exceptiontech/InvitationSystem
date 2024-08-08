<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisings', function (Blueprint $table) {
            $table->id();
            $table->string('type',45)->nullable();
            $table->integer('ord')->default(0);
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->string('img',300)->nullable();
            $table->string('img_thumbnail',150)->nullable();
            $table->text('url_l')->nullable();
            $table->integer('with_id')->default(0);
            $table->text('google_adv')->nullable();
            $table->enum('v_in_home',['Y','N'])->default('Y');
            $table->enum('v_in_slide',['Y','N'])->default('Y');
            $table->enum('v_in_app',['Y','N'])->default('Y');
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
        Schema::dropIfExists('advertisings');
    }
}
