<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('label')->nullable();
            $table->timestamps();
        });

        Schema::create('role_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('shop_id')->default(1);

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles');

            $table->foreign('shop_id')
                ->references('id')
                ->on('shops');

            $table->primary(['role_id', 'user_id', 'shop_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_user', function (Blueprint $table) {
            $table->dropForeign('role_user_role_id_foreign');
            $table->dropForeign('role_user_user_id_foreign');
            $table->dropForeign('role_user_shop_id_foreign');
        });
        Schema::drop('role_user');
        Schema::drop('roles');
    }
}
