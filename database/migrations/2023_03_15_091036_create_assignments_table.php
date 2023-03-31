<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cource_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('file_path')->nullable(); 
            $table->dateTime('due_date')->nullable();
            $table->timestamps(); 
            
            $table->foreign('cource_id')->references('id')->on('cources')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('assignments');
    }
};
