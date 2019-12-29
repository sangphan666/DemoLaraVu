<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGroupIdToJpaUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jpa_users', function (Blueprint $table) {
            // 1. Create new column
            // You probably want to make the new column nullable
            $table->integer('group_id')->unsigned()->nullable()->after('user_id');

            // 2. Create foreign key constraints
            $table->foreign('group_id')
                ->references('group_id')->on('jpa_group')
                ->onDelete('cascade')
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jpa_users', function (Blueprint $table) {
            //
        });
    }
}
