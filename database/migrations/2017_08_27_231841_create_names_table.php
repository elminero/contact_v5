<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('names', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('first')->nullable();
            $table->string('last')->nullable();
            $table->string('middle')->nullable();
            $table->string('alias')->nullable();
            $table->integer('bday')->nullable();
            $table->integer('bmonth')->nullable();
            $table->integer('byear')->nullable();
            // $table->date('dob')->nullable();
            $table->text('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('names');
    }
}
