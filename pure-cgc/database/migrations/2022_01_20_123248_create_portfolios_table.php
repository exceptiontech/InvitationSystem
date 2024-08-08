<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->default(0);
            $table->unsignedBigInteger('category_id')->default(0);
            $table->integer('ord')->default(0);
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->text('img')->nullable();
            $table->text('logo')->nullable();
            $table->string('url_link')->nullable();
            $table->text('details')->nullable();
            $table->text('details_en')->nullable();
            $table->integer('num_views')->default(0);
            $table->enum('is_active',['Y','N'])->default('Y');
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();
            $table->string('user_ip',15)->nullable();
            $table->string('user_pc_info',230)->nullable();
            $table->integer('user_added')->default(0);
            $table->foreign('category_id')->default(0)->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}
