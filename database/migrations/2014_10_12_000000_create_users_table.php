<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('work_email')->unique()->nullable();
            $table->string('cellphone')->nullable();
            $table->string('occupation')->nullable();
            $table->string('industry')->nullable();
            $table->string('password');
            $table->text('address')->nullable();
            $table->text('passion')->nullable();
            $table->text('skills')->nullable();
            $table->string('ugrad_name')->nullable();
            $table->text('ugrad_major')->nullable();
            $table->string('grad_inst_name')->nullable();
            $table->text('grad_major')->nullable();
            $table->boolean('mentor')->default(0);
            $table->boolean('activate')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
