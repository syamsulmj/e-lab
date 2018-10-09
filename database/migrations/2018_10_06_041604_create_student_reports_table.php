<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matrix_number');
            $table->text('title');
            $table->text('introduction')->nullable();
            $table->text('problem_statement')->nullable();
            $table->text('objective')->nullable();
            $table->text('procedure')->nullable();
            $table->text('results')->nullable();
            $table->text('discussion')->nullable();
            $table->text('conclusion')->nullable();
            $table->text('reference')->nullable();
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
        Schema::dropIfExists('student_reports');
    }
}
