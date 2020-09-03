<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        $table = DB::table('industries');
        $table->truncate();

        $data = [
            ['name' => 'Education'],
            ['name' => 'Health'],
            ['name' => 'Information Technology'],
            ['name' => 'Construction'],
            ['name' => 'Civil Services'],
        
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
        Schema::dropIfExists('industries');
    }
}
