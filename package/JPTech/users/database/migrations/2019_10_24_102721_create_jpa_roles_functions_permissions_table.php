<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJpaRolesFunctionsPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jpa_roles_functions_permissions', function (Blueprint $table) {
            $table->primary(['role_id', 'function_code', 'permission_code'], 'jpa_roles_functions_permissions_primary');
            $table->integer('role_id');
            $table->integer('function_code');
            $table->integer('permission_code');
            $table->timestamp('created_at')->useCurrent();
            $table->integer('created_by');
            $table->timestamp('updated_at')->useCurrent();
            $table->integer('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jpa_roles_functions_permissions');
    }
}
