<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSquadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('squads', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            $table->string('project_service')->nullable();
            $table->text('project_service_desc')->nullable();
            $table->text('project_technology')->nullable();
            $table->string('squad_size')->nullable();
            $table->string('project_status')->nullable();
            $table->text('project_status_desc')->nullable();
            $table->tinyInteger('calendly')->default('0');

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
        Schema::dropIfExists('squads');
    }
}
