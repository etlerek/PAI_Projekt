<?php

class City
{
    private string $name;
    private string $img;
    private string $coordinates;

    public function __construct(string $name, string $img, string $coordinates)
    {
        $this->name = $name;
        $this->img = $img;
        $this->coordinates = $coordinates;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getImg(): string
    {
        return $this->img;
    }

    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    public function getCoordinates(): string
    {
        return $this->coordinates;
    }

    public function setCoordinates(string $coordinates): void
    {
        $this->coordinates = $coordinates;
    }

}