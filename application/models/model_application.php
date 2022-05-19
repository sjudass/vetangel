<?php

class Application extends Model
{
    /**
     * Получаем список всех заявок на приём к ветеринару
     *
     * @return array|bool
     */
    public function getAllApplications()
    {
        $query = 'select *, applications.id as application_id FROM applications JOIN clients ON applications.client_id = clients.id';

        return $this->getDataList($query);
    }

    /**
     * Получаем заявку по идентификатору
     *
     * @param $id
     * @return array|bool
     */
    public function getApplicationById($id)
    {
        $query = 'select *, applications.id as application_id FROM applications JOIN clients ON applications.client_id = clients.id WHERE applications.id = ?';

        return $this->getDataRow($query, [$id]);
    }

    /**
     * Получаем список всех заявок клиента
     *
     * @param $clientId
     * @return array|bool
     */
    public function getApplicationsByClientId($clientId)
    {
        $query = 'select * FROM applications WHERE client_id = ?';

        return $this->getDataList($query, [$clientId]);
    }

    /**
     * Создаем заявку
     *
     * @param $params
     * @return false|PDOStatement
     */
    public function createApplication($params)
    {
        $query = 'INSERT INTO applications (client_id, receipt_date, service, message, pet_name, pet_age, pet_weight, pet_gender, created_at, updated_at)'.
                    'VALUES (?,?,?,?,?,?,?,?,?,?)';

        return $this->setData($query, $params);
    }

    /**
     * Обновляем информацию по заявке
     *
     * @param $params
     * @return mixed
     */
    public function updateApplication($params)
    {
        $query = 'UPDATE applications SET receipt_date = ?, status = ?, updated_at = ? WHERE id = ?';

        return $this->setData($query, $params);
    }

    /**
     * Удаляем заявку
     *
     * @param $id
     * @return mixed
     */
    public function deleteApplication($id)
    {
        $query = 'DELETE FROM applications WHERE id = ?';

        return $this->setData($query, [$id]);
    }
}