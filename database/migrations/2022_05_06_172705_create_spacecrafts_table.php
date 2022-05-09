<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spacecrafts', function (Blueprint $table) {
             
            $table->increments('id');
            $table->string('name');
            $table->string('class');
            $table->integer('crew');
            $table->string('image');
            $table->float('value');
            $table->string('status');
            $table->string('armament');
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
        Schema::dropIfExists('spacecrafts');
    }
};
