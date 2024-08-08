<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->default(0);
            $table->integer('admin_view')->default(0);
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile',25)->nullable();
            $table->string('tel',20)->nullable();
            $table->string('fax',20)->nullable();
            $table->string('subject',150)->nullable();
            $table->text('message')->nullable();
            $table->string('file',150)->nullable();
            $table->softDeletes('deleted_at', 0);
            $table->timestamp('created_at')->nullable();
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
        Schema::dropIfExists('contact_us');
    }
}
