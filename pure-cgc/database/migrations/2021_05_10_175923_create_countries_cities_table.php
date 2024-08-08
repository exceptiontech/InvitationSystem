<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries_cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type',15)->default(0);
            $table->unsignedBigInteger('parent_id')->default(0)->references('id')->on('countries_cities')->onDelete('cascade');
            $table->integer('ord')->default(0);
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->text('img')->nullable();
            $table->string('img_thumbnail',150)->nullable();
            $table->string('flag',150)->nullable();
            $table->text('currency_code')->nullable();
            $table->text('currency_code_en')->nullable();
            $table->text('country_code')->nullable();
            $table->text('dail_code')->nullable();
            $table->integer('num_views')->default(0);
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
        Schema::dropIfExists('countries_cities');
    }
}
