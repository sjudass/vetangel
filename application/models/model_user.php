<?php

class User extends Model
{
    /**
     * Получаем пользователя по логину
     *
     * @param $login
     * @return array|bool
     */
    public function getUserByLogin($login)
    {
        $query = 'SELECT * FROM `users` WHERE login = ?';

        return $this->getDataRow($query, [$login]);
    }
}