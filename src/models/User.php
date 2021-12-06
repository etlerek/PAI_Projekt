<?php

class User
{
    private $email;
    private $password;
    private $name;
    private $surename;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSurename(): string
    {
        return $this->surename;
    }

    public function setSurename(string $surename): void
    {
        $this->surename = $surename;
    }

    public function __construct(string $email,string $password,string $name,string $surename)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surename = $surename;
    }

}