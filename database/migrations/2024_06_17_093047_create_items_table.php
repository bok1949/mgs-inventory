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
            $table->unsignedBigInteger('brand_id')->index();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->unsignedBigInteger('suplier_id')->index();
            $table->foreign('suplier_id')->references('id')->on('suppliers');
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('sku')->unique();
            $table->uuid('item_qrcode')->unique();
            $table->double('price');
            $table->smallInteger('quantity')->default(0);
            $table->smallInteger('available')->default(0);
            $table->smallInteger('defective')->default(0);
            $table->bigInteger('created_by')->index();
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
