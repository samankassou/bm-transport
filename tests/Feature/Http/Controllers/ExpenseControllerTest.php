<?php

declare(strict_types=1);

use App\Models\Company;
use Inertia\Testing\AssertableInertia as Assert;

test('can list expenses', function () {
    $company = Company::factory()
        ->hasUsers(1)
        ->hasExpenses(5)
        ->create();
    $user = $company->users->first();

    $response = $this->actingAs($user)
        ->get('expenses');

    $response->assertStatus(200)
        ->assertInertia(function (Assert $page) {
            $page->component('Expenses/Index');
            $page->has('expenses.data', 5, function (Assert $page) {
                $page->hasAll(['id', 'company_id', 'type_of_expense_id', 'type_of_expense', 'title', 'date', 'amount', 'comments', 'created_at', 'updated_at']);
            });
        });
});

it('can create an expense', function () {
    $company = Company::factory()
        ->hasUsers(1)
        ->hasTypeOfExpenses(1)
        ->create();
    $user = $company->users->first();
    $typeOfExpense = $company->typeOfExpenses->first();

    $response = $this->actingAs($user)
        ->post(route('expenses.store'), [
            'type_of_expense_id' => $typeOfExpense->id,
            'title' => 'Fuel',
            'date' => '2021-01-01',
            'amount' => 500,
        ]);

    $response->assertStatus(302)
        ->assertRedirect('/expenses');

    $this->assertDatabaseHas('expenses', [
        'company_id' => $company->id,
        'type_of_expense_id' => $typeOfExpense->id,
        'title' => 'Fuel',
        'date' => '2021-01-01',
        'amount' => 500,
    ]);
});

test('the amount of the expense should be numeric when creating', function () {
    $company = Company::factory()
        ->hasUsers(1)
        ->hasTypeOfExpenses(1)
        ->create();
    $user = $company->users->first();
    $typeOfExpense = $company->typeOfExpenses->first();

    $response = $this->actingAs($user)
        ->post(route('expenses.store'), [
            'type_of_expense_id' => $typeOfExpense->id,
            'title' => 'Fuel',
            'date' => '2021-01-01',
            'amount' => 'not-numeric',
        ]);

    $response->assertStatus(302)
        ->assertSessionHasErrors('amount');
});

it('can update an expense', function () {
    $company = Company::factory()
        ->hasUsers(1)
        ->hasTypeOfExpenses(1)
        ->hasExpenses(1)
        ->create();
    $user = $company->users->first();
    $expense = $company->expenses->first();
    $typeOfExpense = $company->typeOfExpenses->first();

    $response = $this->actingAs($user)
        ->put(route('expenses.update', ['expense' => $expense]), [
            'type_of_expense_id' => $typeOfExpense->id,
            'title' => 'Fuel',
            'date' => '2021-01-01',
            'amount' => 500,
        ]);

    $response->assertStatus(302)
        ->assertRedirect('/expenses');

    $this->assertDatabaseHas('expenses', [
        'id' => $expense->id,
        'type_of_expense_id' => $typeOfExpense->id,
        'title' => 'Fuel',
        'date' => '2021-01-01',
        'amount' => 500,
    ]);
});

it('can delete an expense', function () {
    $company = Company::factory()
        ->hasUsers(1)
        ->hasExpenses(1)
        ->create();
    $expense = $company->expenses->first();
    $user = $company->users->first();

    $response = $this->actingAs($user)
        ->delete(route('expenses.destroy', ['expense' => $expense]));

    $response->assertStatus(302)
        ->assertRedirect('/expenses');

    $this->assertDatabaseMissing('expenses', [
        'id' => $expense->id,
    ]);
});
