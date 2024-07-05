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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id')->index()->nullable();
            $table->unsignedBigInteger('supplier_id')->index()->nullable();
            $table->unsignedBigInteger('product_id')->index()->nullable();
            $table->uuid('item_qrcode')->unique();
            $table->char('price', 11)->nullable();
            $table->char('quantity', 11)->nullable();
            $table->char('available', 11)->nullable();
            $table->char('defective', 11)->nullable();
            $table->char('unit_measurement', 11)->nullable();
            $table->string('specification')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
