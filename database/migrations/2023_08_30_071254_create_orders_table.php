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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('flat')->nullable();
            $table->string('house')->nullable();
            $table->string('road')->nullable();
            $table->string('area')->nullable();
            $table->string('dry_shirt_qty')->nullable();
            $table->string('dry_pants_qty')->nullable();
            $table->string('dry_punjabi_qty')->nullable();
            $table->string('dry_others_qty')->nullable();
            $table->string('wash_shirt_qty')->nullable();
            $table->string('wash_pants_qty')->nullable();
            $table->string('wash_punjabi_qty')->nullable();
            $table->string('wash_others_qty')->nullable();
            $table->string('loundary_shirt_qty')->nullable();
            $table->string('loundary_pants_qty')->nullable();
            $table->string('loundary_punjabi_qty')->nullable();
            $table->string('loundary_others_qty')->nullable();
            $table->string('others_shirt_qty')->nullable();
            $table->string('others_pants_qty')->nullable();
            $table->string('others_punjabi_qty')->nullable();
            $table->string('others_others_qty')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
