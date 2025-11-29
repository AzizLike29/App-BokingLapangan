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
        Schema::create('courts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('image_url')->nullable();
            $table->time('open_time')->nullable();
            $table->time('close_time')->nullable();
            $table->unsignedTinyInteger('field_count')
                ->default(0);
            $table->string('maps_url')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_whatsapp')->nullable();
            $table->unsignedTinyInteger('rating')
                ->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courts');
    }
};
