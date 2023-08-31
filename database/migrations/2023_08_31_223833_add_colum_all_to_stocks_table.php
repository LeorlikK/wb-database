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
        Schema::table('stocks', function (Blueprint $table) {
            $table->date('date');
            $table->date('last_change_date');
            $table->string('supplier_article');
            $table->string('tech_size');
            $table->string('barcode');
            $table->integer('quantity'); //
            $table->boolean('is_supply');
            $table->boolean('is_realization');
            $table->integer('quantity_full'); //
            $table->string('warehouse_name');
            $table->integer('in_way_to_client');
            $table->integer('in_way_from_client');
            $table->unsignedBigInteger('nm_id');
            $table->string('subject');
            $table->string('category');
            $table->string('brand');
            $table->string('sc_code');
            $table->float('price');
            $table->integer('discount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('last_change_date');
            $table->dropColumn('supplier_article');
            $table->dropColumn('tech_size');
            $table->dropColumn('barcode');
            $table->dropColumn('quantity');
            $table->dropColumn('is_supply');
            $table->dropColumn('is_realization');
            $table->dropColumn('quantity_full');
            $table->dropColumn('warehouse_name');
            $table->dropColumn('in_way_to_client');
            $table->dropColumn('in_way_from_client');
            $table->dropColumn('nm_id');
            $table->dropColumn('subject');
            $table->dropColumn('category');
            $table->dropColumn('brand');
            $table->dropColumn('sc_code');
            $table->dropColumn('price');
            $table->dropColumn('discount');
        });
    }
};
