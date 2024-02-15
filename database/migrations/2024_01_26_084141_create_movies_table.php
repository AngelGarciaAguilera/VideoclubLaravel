<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            /*Por convención, la clave primaria es un ID de tipo UNSIGNED_BIGINTEGER y AUTOINCREMENT*/
            $table->id();
            $table->string("title");
            $table->year("year");
            $table->string("director", 64);
            $table->string("poster");
            $table->boolean("rented")->default(false);
            $table->text("synopsis");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
