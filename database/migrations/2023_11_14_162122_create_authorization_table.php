<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorization', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('social_id');
            $table->string('consumer_key')->unique();
            $table->string('consumer_secret')->unique();
            $table->string('access_token')->unique();
            $table->string('token_secret')->unique();
            $table->string('bearer_token')->unique();
            $table->string('client_id')->unique();
            $table->string('client_secret')->unique();
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
        Schema::dropIfExists('authorization');
    }
}
