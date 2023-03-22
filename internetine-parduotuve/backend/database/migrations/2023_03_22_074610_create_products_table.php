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
        Schema::create('products', function (Blueprint $table) {
            // id
            // name - string, 255
            // sku - string, 50
            // photo - stringas, 255, null
            // warehouse_qty - interger, default: 0
            // price - float
            // status - bolean, default: 1
            // created_at
            // updated_at

            $table->id();
            $table->string('name', 255);
            $table->string('sku', 50);
            $table->string('photo', 255)->nullable();
            $table->integer('warehouse_qty')->default(0);
            $table->float('price', 12, 2)->unsigned();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
