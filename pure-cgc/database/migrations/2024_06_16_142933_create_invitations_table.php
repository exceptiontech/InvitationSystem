<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->string('event_title');
            $table->string('organization');
            $table->date('event_date')->nullable();
            $table->time('event_time')->nullable();
            $table->string('event_type')->nullable();
            $table->string('location_link')->nullable();
            $table->date('send_date')->nullable();
            $table->time('send_time')->nullable();
            $table->date('resend_date')->nullable();
            $table->time('resend_time')->nullable();
            $table->text('send_to')->nullable(); // Assuming this will be a JSON or comma-separated string
            $table->boolean('schedule_invitation')->default(false);
            $table->boolean('send_now')->default(false);
            $table->boolean('send_by_email')->default(false);
            $table->boolean('send_by_whatsapp')->default(false);
            $table->longText('subject')->nullable(); // Adding subject field as long text
            $table->string('img')->nullable(); // Adding img field as string (you can adjust the type as per your needs)
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
        Schema::dropIfExists('invitations');
    }
}
