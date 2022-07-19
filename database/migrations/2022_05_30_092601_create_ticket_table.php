<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_status_id');
            $table->string('Tick_Req');
            $table->string('Tick_Subj');
            $table->string('Tick_Issue');
            $table->string('Tick_Attach')->nullable();
            $table->string('Tick_Type');
            $table->string('Tick_Priority')->nullable();
            $table->string('Res_Date')->nullable();
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
        Schema::dropIfExists('ticket');
    }
}
