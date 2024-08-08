<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(0);
            $table->unsignedBigInteger('car_id')->default(0);
            $table->unsignedBigInteger('model_car_id')->default(0);
            $table->integer('manufacturing_year')->default(0);
            $table->enum('is_default_car',['Y','N'])->default('N');
            $table->enum('is_active',['Y','N'])->default('Y');
            $table->softDeletes('deleted_at', 0);
            $table->timestamp('created_at')->nullable();
            $table->foreign('user_id')->default(0)->references('id')->on('users')->onDelete('cascade');
            $table->foreign('car_id')->default(0)->references('id')->on('categories')->onDelete('cascade');
            //$table->foreign('model_car_id')->default(0)->references('id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_cars');
    }
}
