<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('media_id');
            $table->text('consumer_key')->nullable();
            $table->text('consumer_secret')->nullable();
            $table->text('access_token')->nullable();
            $table->text('token_secret')->nullable();
            $table->text('bearer_token')->nullable();
            $table->text('client_id')->nullable();
            $table->text('client_secret')->nullable();
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
        Schema::dropIfExists('consents');
    }
}
