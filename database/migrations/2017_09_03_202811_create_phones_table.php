<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //type number  note
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('name_id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('type');
            $table->string('number');
            $table->text('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phones');
    }
}