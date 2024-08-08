<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('type',15)->default(0);
            $table->integer('category_id')->default(0)->references('id')->on('categories')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('title_en')->nullable();
            $table->string('img',150)->nullable();
            $table->string('img_thumbnail',150)->nullable();
            $table->string('onesignal_id',150)->nullable();
            $table->text('url_link')->nullable();
            $table->text('to_users')->nullable();
            $table->integer('with_id')->default(0);
            $table->text('details')->nullable();
            $table->text('details_en')->nullable();
            $table->text('response_notification')->nullable();
            $table->enum('is_active',['Y','N'])->default('Y');
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();
            $table->string('user_ip',14)->nullable();
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
        Schema::dropIfExists('notifications');
    }
}
