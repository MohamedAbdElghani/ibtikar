<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateWorkHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_work_histories', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('candidate_resume_id');

            $table->string('title');
            $table->string('company')->nullable();
            $table->boolean('currently_work_here')->nullable();
            $table->string('started_month')->nullable();
            $table->string('started_year')->nullable();
            $table->string('ended_month')->nullable();
            $table->string('ended_year')->nullable();
            $table->text('skills_technologies_used')->nullable();
            $table->text('accomplishment')->nullable();
            $table->text('job_desc')->nullable();

            $table->index('user_id', 'candidate_resume_id');

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
        Schema::dropIfExists('candidate_work_histories');
    }
}
