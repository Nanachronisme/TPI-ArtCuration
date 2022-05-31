<?php

use App\Models\Artwork;
use App\Models\Country;
use App\Models\Tag;
use App\Models\TimePeriod;
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
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            //Slug needs to be nullable since we're using SluggableObserver::SAVED in model
            $table->string('artist_name', 130);
            $table->string('slug', 140)->unique(); 
            $table->string('original_name', 130)->nullable();
            $table->string('birth_date', 30)->nullable();
            $table->string('death_date', 30)->nullable();
            $table->string('description', 1500)->nullable();
            $table->string('website1', 2048)->nullable();
            $table->string('website2', 2048)->nullable();
            $table->string('website3', 2048)->nullable();
            $table->string('website4', 2048)->nullable();
            $table->string('website5', 2048)->nullable();
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
        Schema::dropIfExists('artists');
    }
};
