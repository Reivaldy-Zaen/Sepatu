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
        Schema::table('gudang', function (Blueprint $table) {
            $table->unsignedBigInteger('barang_id')->nullable()->after('location');
            $table->integer('stock')->default(0)->after('barang_id');

            // Tambahkan foreign key jika diperlukan
            $table->foreign('barang_id')->references('id')->on('kategori_item')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gudang', function (Blueprint $table) {
            //$table->dropForeign(['barang_id']);
            $table->dropColumn(['barang_id', 'stock']);
        });
    }
};
