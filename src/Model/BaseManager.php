<?php

namespace Model;

use Vendor\Core\PDOFactory;

abstract class BaseManager
{
    protected $db;

    public function__construct()
    {
        $this->db = PDOFactory::getMysqlConnexion();
    }
}

