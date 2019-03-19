<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class RenameColumnAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin', function (Blueprint $table) {
            //
            $table->renameColumn('username','email'); // rename column
            $table->rename('admin','customer'); // rename table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin', function (Blueprint $table) {
            //
            $table->renameColumn('email','username'); // rename column
            $table->rename('customer','admin'); // rename table
        });
    }
}
