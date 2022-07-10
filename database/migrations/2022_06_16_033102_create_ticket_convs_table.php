<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketConvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_convs', function (Blueprint $table) {
            $table->id();
            $table->string('Tick_Status');
            $table->string('Log_Title');
            $table->string('Log_Desc');
            $table->string('Log_Creator');
            $table->string('Log_Creator_Type');
            $table->string('Log_Attachment');
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
        Schema::dropIfExists('ticket_convs');
    }
}
