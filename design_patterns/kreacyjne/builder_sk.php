<?php

/**
 * Kreacyjny
 *
 * Problem: jak uniknąć nadpodziewanie długich i niezrozumiałych konstruktorów?
 * Używanie tagiego konstruktora po stronie klienta jest niewygodne, trudne i podatne na błędy
 * (parametry obowiązkowe, optymalne, zainicjowane)
 *
 * Jak tworzyć różne warianty obiektów?
 * > Tworzenie obiektu etapami
 * > Elatyczność: tworzenie różnych wariantów obiektu
 *
 * Pizza - obiekt który posiada wiele wariantów
 */
class Pizza
{
    public function __construct(
        protected string $size,
        protected bool $tomato = false,
        protected bool $extraCheese = false,
        protected bool $bacon = false,
    ) {
    }

    public function getName()
    {
        return 'Pizza';
    }
}

$pizza = new Pizza('small', true, false, true);
var_dump($pizza);

class PizzaBuilder
{
    protected bool $tomato = false;
    protected bool $extraCheese = false;
    protected bool $bacon = false;

    public function __construct(
        protected string $size,
    ) {
    }

    public function addTomato()
    {
        $this->tomato = true;
    }

    public function addExtraCheese()
    {
        $this->extraCheese = true;
    }

    public function addBacon()
    {
        $this->bacon = true;
    }
}

$pizzaBuilder = new PizzaBuilder('small');
$pizzaBuilder->addBacon();

var_dump($pizzaBuilder);
