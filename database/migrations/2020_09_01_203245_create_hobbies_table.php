<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHobbiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hobbies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        $table = DB::table('hobbies');
        $table->truncate();

        $data = [
            ['name' => 'Cricket'],
            ['name' => 'Movies'],
            ['name' => 'Drawing'],
            ['name' => 'Picnic'],
            ['name' => 'Cycling'],
            ['name' => 'Swimming'],
        
        ];
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hobbies');
    }
}
