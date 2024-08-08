<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHiringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hirings', function (Blueprint $table) {
            $table->id();
            $table->enum('type' , [1 , 2])->default(1);
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('cv');
            $table->foreignId('field_id')->constrained('fields')->onDelete('cascade');
            $table->string('address');
            $table->date('birth_date');
            $table->decimal('expected_sal' , 8 , 2)->default(0);
            $table->enum('gender' , [ 0 , 1]);
            $table->decimal('experience_years' , 8 , 2);
            $table->text('summary');
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
        Schema::dropIfExists('hirings');
    }
}
