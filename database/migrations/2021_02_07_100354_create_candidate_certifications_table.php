<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_certifications', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('candidate_resume_id');

            $table->string('name')->nullable();
            $table->string('issuing_organization')->nullable();
            $table->string('issue_month')->nullable();
            $table->string('issue_year')->nullable();

            $table->string('expiration_month')->nullable();
            $table->string('expiration_year')->nullable();
            $table->string('credential_id')->nullable();
            $table->string('credential_url')->nullable();

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
        Schema::dropIfExists('candidate_certifications');
    }
}
