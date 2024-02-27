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
        Schema::create('purchasesuplier', function (Blueprint $table) {
            $table->id();
            $table->string('idpurchase');
            $table->integer('supplier');
            $table->string('codeproduct');
            $table->string('productname');
            $table->decimal('weightproduct');
            $table->decimal('caratproduct');
            $table->bigInteger('purchaseprice');
            $table->date('purchasedate');
            $table->string('conditionproduct');
            $table->integer('categoriesproduct');
            $table->string('photoproduct');
            $table->integer('typeproduct');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchasesuplier');
    }
};
