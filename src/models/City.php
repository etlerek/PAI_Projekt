<?php

class City
{
    private string $name;
    private int $pinsNumber;
    private string $imageUrl;

    public function __construct(string $name, int $pinsNumber, string $imageUrl)
    {
        $this->name = $name;
        $this->pinsNumber = $pinsNumber;
        $this->imageUrl = $imageUrl;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPinsNumber(): int
    {
        return $this->pinsNumber;
    }

    public function setPinsNumber(int $pinsNumber): void
    {
        $this->pinsNumber = $pinsNumber;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }
}