<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0)->references('id')->on('users')->onDelete('cascade');
            $table->integer('with_id')->default(0);
            $table->string('request_type',45)->nullable();
            $table->enum('is_approved',['Y','N'])->default('N');
            $table->enum('is_viewed',['Y','N'])->default('N');
            $table->text('details')->nullable();
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();
            $table->string('user_ip',14)->nullable();
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
        Schema::dropIfExists('users_requests');
    }
}
