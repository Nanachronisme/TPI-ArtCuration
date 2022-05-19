<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artworks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('original_title', 255)->nullable();
            $table->string('dimensions', 255)->nullable();
            $table->string('source_link', 2048);
            $table->string('description', 1500)->nullable();
            $table->string('image_path', 2048); //TODO verify length, corresponds to maximum file path
            $table->string('creation_date', 20);
            $table->string('copyright', 64);
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
        Schema::dropIfExists('artworks');
    }
};
