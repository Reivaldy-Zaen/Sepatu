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
        Schema::create('gudang', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('location')->nullable();
            $table->timestamps();
        });

        Schema::create('kategori_item', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Running','Futsal','Sneakers','Canvas']);
            $table->enum('category', ['Olahraga', 'Santai']);
            $table->integer('size');
            $table->enum('color', ['Black', 'White', 'Blue', 'Brown']);
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('stocks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('gudang_id');
            $table->unsignedBigInteger('kategori_id');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('gudang_id')->references('id')->on('gudang')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategori_item')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};