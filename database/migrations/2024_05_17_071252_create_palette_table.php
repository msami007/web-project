<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaletteTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('palette', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('hex1');
            $table->string('hex2');
            $table->string('hex3');
            $table->string('hex4');
            $table->string('hex5');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('palette');
    }
}
?>
