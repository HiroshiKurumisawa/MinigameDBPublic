<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('room_settings', function (Blueprint $table) {
            $table->string('user_host');
            $table->string('user_entry');
            $table->tinyInteger('ready_status_host')->unsigned();
            $table->tinyInteger('ready_status_entry')->unsigned();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_settings', function (Blueprint $table) {
            $table->dropColumn('user_host');
            $table->dropColumn('user_entry');
            $table->dropColumn('ready_status_host');
            $table->dropColumn('ready_status_entry');
        });
    }
};
