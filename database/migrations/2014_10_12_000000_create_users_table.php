<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned()->nullable();
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->enum('gender', array('Male', 'Female', 'Other'));
            $table->date('date_of_birth');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile', 20)->nullable();
            $table->string('avatar', 100)->nullable();
            $table->integer('userable_id')->nullable();
            $table->string('userable_type', 150)->nullable();
            $table->enum('status', [1, 0, 2])->comment("1 = Active, 0 = Block, 2 = Draft");
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
