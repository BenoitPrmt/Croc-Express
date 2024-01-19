<?php

class Product
{
    private int $id;
    private string $name;
    private string $description;
    private int $price;
    private int $buyingPrice;
    private int $categoryId;
    private bool|null $isHidden;

    public function __construct(array $props)
    {
        $this->hydrate($props);
    }

    public function hydrate(array $props): void
    {
        if (is_array($props) && count($props)) {
            foreach ($props as $key => $prop) {
                // On défini le nom de la méthode que l'on souhaite appeler
                $method = "set" . ucfirst($key);

                // On vérifie si la méthode existe
                if (method_exists($this, $method)) {
                    // Si elle existe, on appelle la méthode et on lui passe en paramètre sa valeur associée
                    $this->$method($prop);
                }
            }
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getBuyingPrice(): int
    {
        return $this->buyingPrice;
    }

    public function setBuyingPrice(int $buying_price): void
    {
        $this->buyingPrice = $buying_price;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $category_id): void
    {
        $this->categoryId = $category_id;
    }

    public function getIsHidden(): bool|null
    {
        return $this->isHidden;
    }

    public function setIsHidden(bool|null $is_hidden): void
    {
        $this->isHidden = $is_hidden;
    }



}