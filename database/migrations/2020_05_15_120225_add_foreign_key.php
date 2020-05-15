<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->foreign('auto_id')->references('id')
                ->on('autos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('histories', function (Blueprint $table) {
            $table->foreign('auto_id')->references('id')
                ->on('autos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
        Schema::table('favorites', function (Blueprint $table) {
            $table->foreign('auto_id')->references('id')
                ->on('autos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('client_id')->references('id')
                ->on('clients')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('auto_id')->references('id')
                ->on('autos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('client_id')->references('id')
                ->on('clients')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
        Schema::table('model_cars', function (Blueprint $table) {
            $table->foreign('brand_id')->references('id')
                ->on('brands')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('types', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')
                ->on('roles')->onUpdate('cascade')->onDelete('set null');
        });
        Schema::table('clients', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')
                ->on('cities')->onUpdate('cascade')->onDelete('set null');
        });
        Schema::table('autos', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')
                ->on('types')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreign('modelcar_id')->references('id')
                ->on('model_cars')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreign('status_id')->references('id')
                ->on('statuses')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreign('city_id')->references('id')
                ->on('cities')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')
                ->on('posts')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign(['auto_id']);
        });
        Schema::table('histories', function (Blueprint $table) {
            $table->dropForeign(['auto_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::table('favorites', function (Blueprint $table) {
            $table->dropForeign(['auto_id']);
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['auto_id']);
            $table->dropForeign(['client_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::table('model_cars', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
        });
        Schema::table('types', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });
        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
        });
        Schema::table('autos', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            $table->dropForeign(['modelcar_id']);
            $table->dropForeign(['status_id']);
            $table->dropForeign(['city_id']);
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
}
