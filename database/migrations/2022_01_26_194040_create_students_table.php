<?php

use App\Models\Student;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('school_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->enum('gender', Student::getEnum('gender'));
            $table->date('date_of_birth');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile', 20)->nullable();
            $table->string('avatar', 100)->nullable();
            $table->enum('status', [1, 0, 2])->comment("1 = Active, 0 = Block, 2 = Draft");
            $table->string('gr_number', 25)->nullable();
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
        Schema::dropIfExists('students');
    }
}
