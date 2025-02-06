<?php

declare(strict_types=1);

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
        Schema::create('supplier_types', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->string('name');
            $table->timestamps();
        });
    }
};
