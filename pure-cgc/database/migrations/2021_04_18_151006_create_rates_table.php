<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->unsignedBigInteger('user_id')->default(0);
            $table->integer('rated_id')->default(0);
            $table->smallInteger('rate')->default(0);
            $table->smallInteger('rate_app')->default(0);
            $table->text('notes')->nullable();
            $table->foreign('user_id')->default(0)->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->string('user_ip',15)->nullable();
            $table->string('user_pc_info',230)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
}
