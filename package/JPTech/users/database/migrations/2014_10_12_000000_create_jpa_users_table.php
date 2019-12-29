<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJpaUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jpa_users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('name', 100, 0);
            $table->string('email', 100, 0)->unique();
            $table->string('password', 255, 0);
            $table->timestamp('password_experied')->nullable();
            $table->timestamp('login_at')->nullable();
            $table->unsignedSmallInteger('login_fail_count')->default(0);
            $table->boolean('is_active')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('jpa_users');
    }
}
