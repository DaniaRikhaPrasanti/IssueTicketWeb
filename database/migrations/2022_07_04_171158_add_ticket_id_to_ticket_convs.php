<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTicketIdToTicketConvs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_convs', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('ticket_id')->nullable();
            $table->foreign('ticket_id')->references('id')->on('ticket_convs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_convs', function (Blueprint $table) {
            //
            $table->dropForeign('ticket_convs_ticket_id_foreign');
            $table->dropColumn('ticket_id');
        });
    }
}
