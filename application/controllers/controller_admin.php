<?php

/**
 * Контроллер Панели администратора
 */
class Controller_admin extends Controller
{
    /**
     * Главная страница Панели администратора
     *
     * @return void
     */
    function action_index()
    {
        Auth::checkAuth();
        $this->view->generate('admin_applications_view.php', ['applications' => (new Application())->getAllApplications()]);
    }

    /**
     * Страница авторизации пользователя
     *
     * @return void
     */
    function action_login()
    {
        Auth::checklogin();
        if ($_SERVER["REQUEST_METHOD"] == 'POST'){
            $admin = Auth::login($_POST['login'], $_POST['password']);
            if ($admin) {
                $_SESSION['admin'] = $admin;
                header("Location: https://{$_SERVER['HTTP_HOST']}/admin");
            }
        }
        $this->view->generate('login_view.php');
    }

    /**
     * Выход пользователя из системы
     *
     * @return void
     */
    function action_logout()
    {
        session_destroy();
        header("Location: https://{$_SERVER['HTTP_HOST']}/admin/login");
    }

    /**
     * Отображение заявки по идентификатору
     *
     * @param $id
     * @return void
     */
    function action_applicationShow($id)
    {
        $this->view->generate('admin_application_view.php', ['application' => (new Application())->getApplicationById((int) $id)]);
    }

    /**
     * Отображение формы редактирования заявки
     *
     * @param $id
     * @return void
     */
    function action_applicationUpdateView($id)
    {
        $this->view->generate('admin_application_edit_view.php', [
            'application' => (new Application())->getApplicationById((int) $id),
            'statuses' => [
                'Создана',
                'Подтверждена',
                'Перенесена',
                'Отменена',
                'Выполнена',
            ]
        ]);
    }

    /**
     * Обновление данных заявки
     *
     * @param $id
     * @return void
     */
    function action_applicationUpdateAction($id)
    {
        $params = [
            date("Y-m-d H:i", strtotime(trim(strip_tags($_POST['receipt-date'])))),
            trim(strip_tags($_POST['status'])),
            date("Y-m-d H:i"),
            (int) $id
        ];

        (new Application())->updateApplication($params);
        header("location: https://{$_SERVER['HTTP_HOST']}/admin/applicationShow/{$id}");
    }

    /**
     * Удаление заявки
     *
     * @param $id
     * @return void
     */
    function action_applicationDelete($id)
    {
        (new Application())->deleteApplication((int) $id);
        header("location: https://{$_SERVER['HTTP_HOST']}/admin/");
    }

    /**
     * Отображение списка клиентов
     *
     * @return void
     */
    function action_clients()
    {
        $this->view->generate('admin_clients_view.php', ['clients' => (new Client())->getAllClients()]);
    }

    /**
     * Отображение данных клиента по идентификатору
     *
     * @param $id
     * @return void
     */
    function action_clientShow($id)
    {
        $this->view->generate('admin_client_view.php', [
            'client' => (new Client())->getClientById((int) $id),
            'applications' => (new Application())->getApplicationsByClientId((int) $id)
        ]);
    }

    /**
     * Отображение формы редактирования клиента
     *
     * @param $id
     * @return void
     */
    function action_clientUpdateView($id)
    {
        $this->view->generate('admin_client_edit_view.php', [
            'client' => (new Client())->getClientById((int) $id)
        ]);
    }

    /**
     * Обновление данных клиента
     *
     * @param $id
     * @return void
     */
    function action_clientUpdateAction($id)
    {
        $params = [
            trim(strip_tags($_POST['name'])),
            trim(strip_tags($_POST['patronymic'])),
            trim(strip_tags($_POST['email'])),
            trim(strip_tags($_POST['phone'])),
            (int) $id
        ];

        (new Client())->updateClient($params);
        header("location: https://{$_SERVER['HTTP_HOST']}/admin/clientShow/{$id}");
    }
}