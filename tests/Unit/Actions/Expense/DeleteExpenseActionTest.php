<?php

declare(strict_types=1);

use App\Actions\Expense\DeleteExpenseAction;
use App\Models\Expense;

it('can delete an expense', function () {
    $expense = Expense::factory()->create();
    $action = app(DeleteExpenseAction::class);

    $action->handle($expense);

    $this->assertDatabaseMissing('expenses', [
        'id' => $expense->id,
    ]);
});
