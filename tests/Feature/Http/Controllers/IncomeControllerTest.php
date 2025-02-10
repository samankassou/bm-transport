<?php

declare(strict_types=1);

use App\Models\Company;
use Inertia\Testing\AssertableInertia as Assert;

test('can list incomes', function () {
    $company = Company::factory()
        ->hasUsers(1)
        ->hasIncomes(5)
        ->create();
    $user = $company->users->first();

    $response = $this->actingAs($user)
        ->get('incomes');

    $response->assertStatus(200)
        ->assertInertia(function (Assert $page) {
            $page->component('Incomes/Index');
            $page->has('incomes.data', 5, function (Assert $page) {
                $page->hasAll(['id', 'company_id', 'type_of_income_id', 'type_of_income', 'title', 'date', 'amount', 'created_at', 'updated_at']);
            });
        });
});

it('can create an income', function () {
    $company = Company::factory()
        ->hasTypeOfIncomes(1)
        ->hasUsers(1)
        ->create();
    $user = $company->users->first();
    $typeOfIncome = $company->typeOfIncomes->first();

    $response = $this->actingAs($user)
        ->post(route('incomes.store'), [
            'type_of_income_id' => $typeOfIncome->id,
            'title' => 'Salary',
            'date' => '2021-01-01',
            'amount' => 1000,
        ]);

    $response->assertStatus(302)
        ->assertRedirect('/incomes');

    $this->assertDatabaseHas('incomes', [
        'company_id' => $company->id,
        'type_of_income_id' => $typeOfIncome->id,
        'title' => 'Salary',
        'date' => '2021-01-01',
        'amount' => 1000,
    ]);
});

test('the amount of the income should be numeric when creating', function () {
    $company = Company::factory()
        ->hasUsers(1)
        ->hasTypeOfIncomes(1)
        ->create();
    $user = $company->users->first();
    $typeOfIncome = $company->typeOfIncomes->first();

    $response = $this->actingAs($user)
        ->post(route('incomes.store'), [
            'type_of_income_id' => $typeOfIncome->id,
            'title' => 'Salary',
            'date' => '2021-01-01',
            'amount' => 'not-numeric',
        ]);

    $response->assertStatus(302)
        ->assertSessionHasErrors('amount');
});

it('can update an income', function () {
    $company = Company::factory()
        ->hasUsers(1)
        ->hasTypeOfIncomes(1)
        ->hasIncomes(1)
        ->create();
    $user = $company->users->first();
    $typeOfIncome = $company->typeOfIncomes->first();
    $income = $company->incomes->first();

    $response = $this->actingAs($user)
        ->putJson(route('incomes.update', ['income' => $income]), [
            'type_of_income_id' => $typeOfIncome->id,
            'title' => 'Salary',
            'date' => '2021-01-01',
            'amount' => 1000,
        ]);

    $response->assertStatus(302)
        ->assertRedirect('/incomes');

    $this->assertDatabaseHas('incomes', [
        'company_id' => $company->id,
        'type_of_income_id' => $typeOfIncome->id,
        'title' => 'Salary',
        'date' => '2021-01-01',
        'amount' => 1000,
    ]);
});

it('can delete an income', function () {
    $company = Company::factory()
        ->hasUsers(1)
        ->hasIncomes(1)
        ->create();

    $user = $company->users->first();
    $income = $company->incomes->first();

    $response = $this
        ->actingAs($user)
        ->delete(route('incomes.destroy', ['income' => $income]));

    $response->assertStatus(302)
        ->assertRedirect('/incomes');

    expect($income->exists())->toBeFalse();
});
