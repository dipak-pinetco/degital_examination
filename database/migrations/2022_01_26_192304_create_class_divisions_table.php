<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_divisions', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('clases_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name', 50);
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['clases_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_divisions');
    }
}
