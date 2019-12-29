<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePermissionCodeToJpaPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jpa_permissions', function (Blueprint $table) {
            //Rename permission_code to permission_id
            $table->renameColumn('permission_code', 'permission_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jpa_permissions', function (Blueprint $table) {
            //
        });
    }
}
