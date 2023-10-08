<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();

            $table
                ->foreignIdFor(\App\Models\Stock::class)
                ->references('id')
                ->on('stocks')
                ->cascadeOnDelete();

            $table->string('price');
            $table->string('percentage');
            $table->enum('movement', ['Up', 'Down']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
