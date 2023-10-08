<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignIdFor(\App\Models\Market::class)
                ->references('id')
                ->on('markets')
                ->cascadeOnDelete();

            $table->string('stock_name');
            $table->string('en_name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
