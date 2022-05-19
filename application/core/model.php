<?php

/**
 * Наследуемый класс работы с базой данных
 */
class Model
{
    public $db;

    /**
     * Производим подключение к базе данных
     */
    public function __construct()
    {
        $this->db = (new Database())->connectToPDO();
    }

    /**
     * @param $query
     * @param $params
     * @return false|PDOStatement
     */
    protected function queryExecute($query, $params = null)
    {
        $query = $this->db->prepare($query);
        $query->execute($params);

        return $query;
    }

    /**
     * @param $query
     * @param $params
     * @return bool|array
     */
    public function getDataRow($query, $params = null)
    {
        return $this->queryExecute($query, $params)->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param $query
     * @param $params
     * @return bool|array
     */
    public function getDataList($query, $params = null)
    {
        return $this->queryExecute($query, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $query
     * @param $params
     * @return false|PDOStatement
     */
    public function setData($query, $params)
    {
        return $this->queryExecute($query, $params);
    }
}