<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('teacher');
            $table->string('time');
            $table->string('day');
            $table->string('Venue');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('timetables');
    }
};
