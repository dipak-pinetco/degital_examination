<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned()->nullable();
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->enum('gender', array('Male', 'Female', 'Other'));
            $table->date('date_of_birth');
            $table->string('email')->unique();
            $table->string('mobile', 20)->nullable();
            $table->string('avatar', 100)->nullable();
			$table->string('degree', 191)->nullable();
            $table->enum('status', [1, 0, 2])->comment("1 = Active, 0 = Block, 2 = Draft");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
