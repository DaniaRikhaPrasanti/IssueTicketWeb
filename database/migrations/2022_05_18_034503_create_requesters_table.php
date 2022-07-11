<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requesters', function (Blueprint $table) {
            $table->id();
            $table->string('Req_Name');
            $table->string('Req_Organization');
            $table->text('Req_Password');
            $table->string('Req_Jabatan');
            $table->string('Req_Email')->unique();
            $table->string('Comp_No');
            $table->string('Req_No');
            $table->string('Req_Address');
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
        Schema::dropIfExists('requesters');
    }
}
