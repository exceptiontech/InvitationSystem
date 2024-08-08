<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryServsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_servs', function (Blueprint $table) {
            $table->id(); 
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->text('logo')->nullable();
            $table->string('url')->nullable();
            $table->text('img')->nullable();
            $table->enum('is_active',['Y','N'])->default('Y');
            $table->integer('ord')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_servs');
    }
}
