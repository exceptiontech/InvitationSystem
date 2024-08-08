<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0)->references('id')->on('users')->onDelete('cascade');
            $table->string('user_key')->nullable()->unique();
            $table->enum('is_open_notifications',['Y','N'])->default('Y');
            $table->integer('balance')->default(0);
            $table->integer('user_points')->default(0);
            $table->string('facility_name',300)->nullable();
            $table->string('facility_name_en',300)->nullable();
            $table->string('tel',25)->nullable();
            $table->string('tax_number',45)->nullable();
            $table->string('commercial_number',45)->nullable();
            $table->string('tax_num_file',150)->nullable();
            $table->string('commercial_num_file',150)->nullable();
            $table->text('website')->nullable();
            $table->integer('country_id')->default(0)->references('id')->on('countries_cities');
            $table->integer('city_id')->default(0)->references('id')->on('countries_cities');
            $table->string('region',45)->nullable();
            $table->string('address',150)->nullable();
            $table->string('address_en',150)->nullable();
            $table->text('files')->nullable();
            $table->string('best_4this_user',150)->nullable();
            $table->string('count_of_fields',45)->nullable();
            $table->enum('product_4souq',['all','export production','local production'])->default('all');
            $table->text('notes')->nullable();
            $table->double('longitude')->default(0);
            $table->double('latitude')->default(0);
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_details');
    }
}
