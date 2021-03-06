<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

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
            $table->string('passion')->nullable();
            $table->string('ugrad_name')->nullable();
            $table->text('ugrad_major')->nullable();
            $table->string('grad_inst_name')->nullable();
            $table->text('grad_major')->nullable();
            $table->string('opportunity')->nullable();
            $table->string('need')->nullable();
            $table->text('job_details')->nullable();
            $table->text('board_ms')->nullable();
            $table->text('organization_ms')->nullable();
            $table->boolean('mentor')->default(0);
            $table->boolean('activate')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $table = DB::table('users');
        $table->truncate();

        $data = [
            ['name' => 'Admin', 'email' => 'admin@mail.com', 'role' => 1, 'password' => Hash::make('123456789')],
            ['name' => 'Ehsan', 'email' => 'ehsan@mail.com', 'role' => 2, 'password' => Hash::make('123456789')],        
        ];

        $table->insert($data);
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
