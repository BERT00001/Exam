<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdminBook extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AdminBook', function (Blueprint $table) {
            $table->id();
            $table->string('Title');
            $table->string('Author');
            $table->integer('Copies');
            $table->integer('Borrowed');
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
      
        Schema::dropIfExists('AdminBook');
    }
}