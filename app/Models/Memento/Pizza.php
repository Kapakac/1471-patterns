<?php

declare(strict_types=1);

namespace App\Models\Memento;

class Pizza
{
    private array $state;
    public string $info;

    public function __construct()
    {
        $this->state[] = 'base';
    }

    public function addIngredient(string $ingredient): void
    {
        $this->state[] = $ingredient;
        $this->info = "В пиццу добавлен ингредиент: {$ingredient}";
    }

    public function createMemento(): Memento
    {
        return new Memento($this->state);
    }

    public function setMemento(Memento $memento): void
    {
        $this->state = $memento->getState();
    }
}
