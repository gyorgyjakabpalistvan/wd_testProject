<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('contract_asset', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_id')->constrained()->cascadeOnDelete();
            $table->foreignId('asset_id')->constrained()->cascadeOnDelete();
            $table->string('serial_number');

            $table->unique(['contract_id', 'asset_id']);
            $table->unique(['asset_id', 'serial_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contract_asset');
    }
};
