<?php

class Place
{
    private int $id;
    private float $x;
    private float $y;
    private string $name;
    private string $address;
    private string $description;
    private string $imageUrl;
    private float $score;
    private string $category;
    private string $coordinates;
    private string $tag;

    public function __construct(string $coordinates, string $name, string $description, string $address, string $imageUrl, string $tag)
    {
        $this->coordinates = $coordinates;
        $this->name = $name;
        $this->description = $description;
        $this->address = $address;
        $this->imageUrl = $imageUrl;
        $this->tag = $tag;
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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
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

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
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

    public function getCoordinates(): string
    {
        return $this->coordinates;
    }

    public function setCoordinates(string $coordinates): void
    {
        $this->coordinates = $coordinates;
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function setTag(string $tag): void
    {
        $this->tag = $tag;
    }



}