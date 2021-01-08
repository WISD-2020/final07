<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('sex')->after('name');
            $table->string('idnum')->after('sex');
            $table->integer('tel')->after('idnum');
            $table->string('birthday')->after('tel');
            $table->string('type')->after('birthday');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('sex');
            $table->dropColumn('idnum');
            $table->dropColumn('tel');
            $table->dropColumn('birthday');
            $table->dropColumn('type');

        });
    }
}
