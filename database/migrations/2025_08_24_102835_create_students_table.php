<?php

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
                $table->id();
                $table->string('name');
                $table->string('unique_id')->unique();
                $table->string('email')->unique();
                $table->string('phone');
                $table->unsignedBigInteger('course_id');
                $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
                $table->decimal('gpa', 3, 2)->nullable();

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
        Schema::dropIfExists('students');
    }
}
