<?php
class User
{
    private $id;
    private $name;
    private $password;
    private $admin;


    //getters
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getAdmin()
    {
        return $this->admin;
    }

    //setters
    public function setId(int $id)
    {
        $this->id = $id;
    } 

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function setAdmin(bool $admin)
    {
        $this->admin = $admin;
    }
}