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
        Schema::create(table: 'skus', callback: function (Blueprint $table): void {
            $table->id();
            $table->foreignId('product_id')->constrained('products');
;           $table->string(column: 'name');
            $table->decimal(column: 'price');
            $table->integer(column:'quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skus');
    }
};
