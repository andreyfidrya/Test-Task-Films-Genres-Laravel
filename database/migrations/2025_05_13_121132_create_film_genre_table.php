<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Film;
use App\Models\Genre;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('film_genre', function (Blueprint $table) {
            $table->foreignIdFor(Film::class)->constrained()->onDelete('cascade');;
            $table->foreignIdFor(Genre::class)->constrained()->onDelete('cascade');;            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_genre');
    }
};
