<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cv');
            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('national_id');
            $table->string('marital_status');
            $table->enum('gender' , [0,1]);
            $table->date('birth_date');
            $table->decimal('expected_sal' , 8 , 2)->default(0);
            $table->decimal('experience_years' , 8 , 2);

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
        Schema::dropIfExists('job_applies');
    }
}
