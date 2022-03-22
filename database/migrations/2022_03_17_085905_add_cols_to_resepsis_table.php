<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsToResepsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resepsis', function (Blueprint $table) {
            $table->string('nama');
            $table->string('email');
            $table->string('tamu');
            $table->string('notelp');
            $table->string('avail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resepsis', function (Blueprint $table) {
            $table->dropColumn('nama');
            $table->dropColumn('email');
            $table->dropColumn('tamu');
            $table->dropColumn('notelp');
            $table->dropColumn('avail');
        });
    }
}
