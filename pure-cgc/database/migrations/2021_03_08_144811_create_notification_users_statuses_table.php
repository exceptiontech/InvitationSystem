<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationUsersStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_users_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0)->references('id')->on('users')->onDelete('cascade');
            $table->integer('notification_id')->default(0)->references('id')->on('notifications')->onDelete('cascade');
            $table->enum('status',['recieved','viewed','deleted'])->default('recieved');
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
        Schema::dropIfExists('notification_users_statuses');
    }
}
