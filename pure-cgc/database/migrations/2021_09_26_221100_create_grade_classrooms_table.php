<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_classrooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_grades_id')->default(0);
            $table->integer('ord')->default(0);
            $table->integer('classroom_number')->default(0);
            $table->integer('classroom_count')->default(0);
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->text('img')->nullable();
            $table->string('img_thumbnail',150)->nullable();
            $table->enum('is_active',['Y','N'])->default('Y');
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();
            $table->string('user_ip',15)->nullable();
            $table->string('user_pc_info',230)->nullable();
            $table->integer('user_added')->default(0);
            $table->foreign('school_grades_id')->default(0)->references('id')->on('school_grades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grade_classrooms');
    }
}
