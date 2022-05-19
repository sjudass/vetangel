<?php

/**
 * Класс подключения к базе данных
 */
class Database
{
    protected $host = '127.0.0.1';
    protected $db = 'vetangel';
    protected $user = 'root';
    protected $password = '';
    protected $charset = "utf8";

    public function getPDOString(): string
    {
        return "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
    }

    public  function connectToPDO(): PDO
    {
        return new PDO($this->getPDOString(), $this->user, $this->password);
    }
}