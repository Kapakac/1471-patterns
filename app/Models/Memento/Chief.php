<?php

declare(strict_types=1);

namespace App\Models\Memento;

class Chief
{
    public array $pizzaStates;
    public string $info;

    public function __construct(public Pizza $pizza)
    {
        $this->pizzaStates[] = $this->pizza->createMemento();
    }

    public function addIngredientToPizza(string $ingredient): void
    {
        $this->pizza->addIngredient($ingredient);
        $this->pizzaStates[] = $this->pizza->createMemento();
    }

    public function undoAddIngredient(): void
    {
        if (count($this->pizzaStates) === 1) {
            $this->pizza->setMemento($this->pizzaStates[0]);
            $this->info = 'Пицца вернулась в исходное состояние';
        } else {
            $this->info = 'Отмена предыдущего действия';
            array_pop($this->pizzaStates);
            $state = $this->pizzaStates[array_key_last($this->pizzaStates)];
            $this->pizza->setMemento($state);
        }
    }
}

