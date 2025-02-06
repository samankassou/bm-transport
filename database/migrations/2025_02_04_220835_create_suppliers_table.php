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
        Schema::create('suppliers', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('supplier_type_id')->constrained();
            $table->foreignId('country_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('rccm_number')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('address')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }
};
