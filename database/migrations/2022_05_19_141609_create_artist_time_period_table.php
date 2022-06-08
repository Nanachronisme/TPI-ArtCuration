<?php

use App\Models\Artist;
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
        Schema::create('artist_time_period', function (Blueprint $table) {
            $table->foreignIdFor(TimePeriod::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Artist::class)->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('artist_time_period');
    }
};
