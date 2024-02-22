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
        Schema::create('purchase', function (Blueprint $table) {
            $table->id();
            $table->string('idpurchase');
            $table->string('productname');
            $table->decimal('weightproduct');
            $table->decimal('caratproduct');
            $table->bigInteger('purchaseprice');
            $table->date('purchasedate');
            $table->string('conditionproduct');
            $table->integer('categoriesproduct');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase');
    }
};
