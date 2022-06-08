<?php

use App\Models\Artwork;
use App\Models\Medium;
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
        Schema::create('artwork_medium', function (Blueprint $table) {
            $table->foreignIdFor(Artwork::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Medium::class, 'medium_id')->onDelete('cascade'); //the specificity was required since laravel does not recognise the medium naming scheme
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
        Schema::dropIfExists('artwork_medium');
    }
};
