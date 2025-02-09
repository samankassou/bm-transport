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
        Schema::create('expenses', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('type_of_expense_id')->constrained();
            $table->string('title')->nullable();
            $table->date('date');
            $table->unsignedInteger('amount');
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }
};
