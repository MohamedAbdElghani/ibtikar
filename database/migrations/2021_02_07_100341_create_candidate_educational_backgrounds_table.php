<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateEducationalBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_educational_backgrounds', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('candidate_resume_id');

            $table->string('school')->nullable();
            $table->string('degree')->nullable();
            $table->string('field_study')->nullable();
            $table->string('started_month')->nullable();
            $table->string('started_year')->nullable();
            $table->string('ended_month')->nullable();
            $table->string('ended_year')->nullable();

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
        Schema::dropIfExists('candidate_educational_backgrounds');
    }
}
