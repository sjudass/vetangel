<?php

class Client extends Model
{
    /**
     * Получаем список всех клиентов из таблицы clients
     *
     * @return bool|array
     */
    public function getAllClients()
    {
        $query = 'SELECT * FROM `clients`';

        return $this->getDataList($query);
    }

    /**
     * Получаем клиента по идентификатору
     *
     * @param $id
     * @return array|bool
     */
    public function getClientById($id)
    {
        $query = 'SELECT * FROM `clients` WHERE id = ?';

        return $this->getDataRow($query, [$id]);
    }

    /**
     * Получаем клиента по почте
     *
     * @param $email
     * @return array|bool
     */
    public function getClientByEmail($email)
    {
        $query = 'SELECT * FROM `clients` WHERE email = ?';

        return $this->getDataRow($query, [$email]);
    }

    /**
     * Добавляем нового клиента в таблицу clients
     *
     * @param $params
     * @return bool|PDOStatement
     */
    public function addClient($params)
    {
        $query = 'INSERT INTO clients (name, patronymic, email, phone) VALUES (?,?,?,?)';

        return $this->setData($query, $params);
    }

    /**
     * Обновляем информацию клиента по идентификатору
     *
     * @param $params
     * @return bool|PDOStatement
     */
    public function updateClient($params)
    {
        $query = 'UPDATE clients SET name = ?, patronymic = ?, email = ?, phone = ? WHERE id = ?';

        return $this->setData($query, $params);
    }
}