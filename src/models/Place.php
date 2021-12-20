<?php

class Place
{
    private int $id;
    private float $x;
    private float $y;
    private string $name;
    private string $adres;
    private string $descryption;
    private string $imageUrl;
    private float $score;
    private string $category;



    public function __construct(int $id, float $x, float $y, string $name, string $adres, string $descryption, string $imageUrl, float $score, string $category)
    {
        $this->id = $id;
        $this->x = $x;
        $this->y = $y;
        $this->name = $name;
        $this->adres = $adres;
        $this->descryption = $descryption;
        $this->imageUrl = $imageUrl;
        $this->score = $score;
        $this->category = $category;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getX(): float
    {
        return $this->x;
    }

    public function setX(float $x): void
    {
        $this->x = $x;
    }

    public function getY(): float
    {
        return $this->y;
    }

    public function setY(float $y): void
    {
        $this->y = $y;
    }

    public function getDescryption(): string
    {
        return $this->descryption;
    }

    public function setDescryption(string $descryption): void
    {
        $this->descryption = $descryption;
    }

    public function getScore(): float
    {
        return $this->score;
    }

    public function setScore(float $score): void
    {
        $this->score = $score;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAdres(): string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): void
    {
        $this->city = $adres;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    public function getCategory(): string
    {
        return $this->category;
    }
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }


}