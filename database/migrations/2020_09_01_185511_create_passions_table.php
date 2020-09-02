<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();
        });


        $table = DB::table('passions');
        $table->truncate();

        $data = [
            ['name' => 'Innovation'],
            ['name' => 'Blockchain'],
            ['name' => 'Education'],
            ['name' => 'Science'],
            ['name' => 'Augmented Reality'],
            ['name' => 'Social Impact'],
        
        ];
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passions');
    }
}
