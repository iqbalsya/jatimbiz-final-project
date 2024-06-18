<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('merchant_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name', 255);
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->integer('weight')->nullable();
            $table->enum('condition', ['bekas', 'baru'])->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->string('purchase_link_shopee', 255)->nullable();
            $table->string('purchase_link_tokopedia', 255)->nullable();
            $table->string('purchase_link_lazada', 255)->nullable();
            $table->string('purchase_link_tiktokshop', 255)->nullable();
            $table->timestamps();
            $table->foreign('merchant_id')->references('id')->on('merchants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}

