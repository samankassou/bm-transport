<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\CompanyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Company extends Model
{
    /** @use HasFactory<CompanyFactory> */
    use HasFactory;

    /**
     * Get the owner that owns the company.
     *
     * @return BelongsTo<User, $this>
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Get the customers for the company.
     *
     * @return HasMany<Customer, $this>
     */
    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class);
    }

    /**
     * Get the type of incomes for the company.
     *
     * @return HasMany<TypeOfIncome, $this>
     */
    public function typeOfIncomes(): HasMany
    {
        return $this->hasMany(TypeOfIncome::class);
    }

    /**
     * Get the incomes for the company.
     *
     * @return HasMany<Income, $this>
     */
    public function incomes(): HasMany
    {
        return $this->hasMany(Income::class);
    }

    /**
     * Get the type of expenses for the company.
     *
     * @return HasMany<TypeOfExpense, $this>
     */
    public function typeOfExpenses(): HasMany
    {
        return $this->hasMany(TypeOfExpense::class);
    }

    /**
     * Get the expenses for the company.
     *
     * @return HasMany<Expense, $this>
     */
    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }
}
