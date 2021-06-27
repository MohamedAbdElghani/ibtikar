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
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('feature_image')->nullable();
            $table->string('google_id')->unique()->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->unique()->nullable();
            $table->string('country')->nullable();
            $table->string('birthdate')->nullable();
            $table->text('describe_yourself')->nullable();
            $table->string('role')->nullable();
            $table->tinyInteger('subscribe_newsletter')->default('0');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
