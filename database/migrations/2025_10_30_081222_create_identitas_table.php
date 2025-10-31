<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('identitas', function (Blueprint $table) {
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

    public function down(): void
    {
        Schema::dropIfExists('identitas');
    }
};
