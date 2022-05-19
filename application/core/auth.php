<?php

/**
 * Класс обеспечивает авторизацию пользователя в приложении
 */
class Auth
{
    /**
     * Метод проверяет наличие пользователя в базе
     *
     * @param $login
     * @param $password
     * @return array|bool|null
     */
    public static function login($login, $password)
    {
        $user = new User();
        $result = $user->getUserByLogin($login);

        if ($result["password"] == $password) {
            return $result;
        } else {
            return null;
        }
    }

    /**
     * Если сессия авторизации отсутствуют, переадресовываем пользователя на страницу авторизации
     *
     * @return void
     */
    public static function checkAuth()
    {
        if (!isset($_SESSION['admin'])) {
            header("Location: https://{$_SERVER['HTTP_HOST']}/admin/login");
        }
    }

    /**
     * Если пользователь авторизован в сессии, перенаправляем его в Панель администратора
     *
     * @return void
     */
    public static function checklogin()
    {
        if (isset($_SESSION['admin'])) {
            header("Location: https://{$_SERVER['HTTP_HOST']}/admin");
        }
    }
}

