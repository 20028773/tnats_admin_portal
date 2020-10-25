<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observations', function (Blueprint $table) {
            $table->id();
            $table->string('guid')->unique();
            $table->integer('user_id');
            $table->string('location')->nullable();
            $table->string('species');
            $table->string('notes'); 
            $table->boolean('approved');
            $table->boolean('active');
            $table->double('longitude')->nullable();
            $table->double('latitude')->nullable();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE observations ADD photo  LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('observations');
    }
}
