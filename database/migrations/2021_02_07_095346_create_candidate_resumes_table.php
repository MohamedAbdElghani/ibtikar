<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_resumes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');

            $table->string('other_role')->nullable();
            $table->text('top_skills')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('personal_website_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('dribbble_url')->nullable();
            $table->string('job_search')->nullable();
            $table->text('work_place')->nullable();
            $table->boolean('working_remotley')->nullable();
            $table->boolean('contractor_position')->nullable();
            $table->integer('min_base_salary')->nullable();
            $table->text('cv_file')->nullable();
            $table->text('camera_time')->nullable();
            $table->text('pipefy_id')->nullable();

            $table->index('user_id');

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
        Schema::dropIfExists('candidate_resumes');
    }
}
