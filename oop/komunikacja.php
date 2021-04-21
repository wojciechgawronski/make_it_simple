<?php

interface ProductInterface
{
    public function __construct(string $name);

    public function getName() : string;
}

class Product implements ProductInterface
{
    public function __construct(private string $name)
    {
    }

    public function getName() : string
    {
        return $this->name;
    }
}

class Cart
{
    private array $products;

    public function addProduct(ProductInterface $product)
    {
        $this->products[] = $product;
    }

    public function listProducts()
    {
        foreach ($this->products as $product) {
            echo $product->getName() . '<br>';
        }
    }
}


$product1 = new Product('bike1');
$product2 = new Product('bike2');
$cart = new Cart();
$cart->addProduct($product1);
$cart->addProduct($product2);
$cart->listProducts();
