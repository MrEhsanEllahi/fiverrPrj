<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interests', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        $table = DB::table('interests');
        $table->truncate();

        $data = [
            ['name' => 'Cricket'],
            ['name' => 'Movies'],
            ['name' => 'Art'],
            ['name' => 'Innovation'],
            ['name' => 'Science'],
            ['name' => 'Swimming'],
            ['name' => 'Business'],
        
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
        Schema::dropIfExists('interests');
    }
}
