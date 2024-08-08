<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_histories', function (Blueprint $table) {
            $table->id();
            $table->string('type',15)->default(0);
            $table->integer('user_id')->default(0)->references('id')->on('users')->onDelete('cascade');
            $table->string('mobile',25)->nullable();
            $table->text('sms')->nullable();
            $table->text('status')->nullable();
            $table->timestamp('created_at')->nullable();
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
        Schema::dropIfExists('sms_histories');
    }
}
