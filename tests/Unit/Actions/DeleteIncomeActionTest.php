<?php

declare(strict_types=1);

use App\Actions\DeleteIncomeAction;
use App\Models\Income;

it('can delete an income', function () {
    $income = Income::factory()->create();
    $action = app(DeleteIncomeAction::class);

    $action->handle($income);

    $this->assertDatabaseMissing('incomes', [
        'id' => $income->id,
    ]);
});
