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
    Schema::create('identitas_websites', function (Blueprint $table) {
        $table->id();
        $table->string('nama_website')->nullable();
        $table->string('email')->nullable();
        $table->string('domain')->nullable();
        $table->string('sosial_network')->nullable();
        $table->string('no_telpon')->nullable();
        $table->text('meta_deskripsi')->nullable();
        $table->string('meta_keyword')->nullable();
        $table->text('google_maps')->nullable();
        $table->string('favicon')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identitas_websites');
    }
};
