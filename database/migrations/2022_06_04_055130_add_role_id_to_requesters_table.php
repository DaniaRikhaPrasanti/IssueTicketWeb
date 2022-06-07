<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleIdToRequestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requesters', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requesters', function (Blueprint $table) {
            $table->dropForeign('requesters_role_id_foreign');
            $table->dropColumn('role_id');
        });
    }
}
