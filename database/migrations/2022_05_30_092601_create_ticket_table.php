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
            $table->string('Tick_Req');
            $table->string('Tick_Subj');
            $table->string('Tick_Status');
            $table->string('Tick_Issue');
            $table->string('Tick_Attach')->nullable();
            $table->string('Tick_Type');
            $table->string('Tick_Priority');
            $table->string('Res_Date');
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
