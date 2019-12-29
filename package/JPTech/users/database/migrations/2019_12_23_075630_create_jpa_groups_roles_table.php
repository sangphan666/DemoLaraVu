<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJpaGroupsRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jpa_groups_roles', function (Blueprint $table) {
            $table->integer('group_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->foreign('group_id')->references('group_id')->on('jpa_groups')
                ->onDelete('cascade');
            $table->foreign('role_id')->references('role_id')->on('jpa_roles')
                ->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->integer('created_by');
            $table->timestamp('updated_at')->useCurrent();
            $table->integer('updated_by')->nullable();
            $table->boolean('delete_flag')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jpa_users_roles');
    }
}
