<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailpostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailpost', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('post')->cascadeOnDelete();
            $table->foreignId('media_id')->constrained('media'); // Asumiendo que también hay una tabla 'media'
            $table->timestamp('published_at')->nullable();
            $table->timestamp('publish_at')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('detailpost');
    }
}
