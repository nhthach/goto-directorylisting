<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInboxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bc_inbox', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('from_user')->nullable();
            $table->bigInteger('to_user')->nullable();
            $table->bigInteger('object_id')->nullable();
            $table->string('object_model',50)->nullable();

            $table->tinyInteger('type')->default(0)->nullable();


            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->timestamps();
        });

        Schema::create('bc_inbox_messages', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->bigInteger('inbox_id')->nullable();
            $table->bigInteger('from_user')->nullable();
            $table->bigInteger('to_user')->nullable();
            $table->text('content')->nullable();
            $table->tinyInteger('type')->default(0)->nullable();
            $table->tinyInteger('is_read')->default(0)->nullable();

            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->timestamps();

        });
        Schema::create('bc_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('from_user')->nullable();
            $table->bigInteger('to_user')->nullable();
            $table->tinyInteger('is_read')->default(0)->nullable();
            $table->string('type',50)->nullable();
            $table->string('type_group',50)->nullable();
            $table->bigInteger('target_id')->nullable();
            $table->bigInteger('target_parent_id')->nullable();
            $table->text('params')->nullable();

            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bc_inbox');
        Schema::dropIfExists('bc_inbox_messages');
        Schema::dropIfExists('bc_notifications');
    }
}
