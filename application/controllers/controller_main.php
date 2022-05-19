<?php
class Controller_Main extends Controller
{
    /**
     * Отображаем главную страницу сайта
     *
     * @return void
     */
    function action_index()
    {
        $this->view->generate('main_view.php');
    }

    /**
     * Создаем заявку и пользователя в системе
     *
     * @return void
     */
    function action_createApplication()
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $email = trim(strip_tags($_POST['email']));
            $clientModel = new Client();
            $client = $clientModel->getClientByEmail($email);

            if (!$client) {
                $clientParams = [
                    trim(strip_tags($_POST['name'])),
                    trim(strip_tags($_POST['patronymic'])),
                    $email,
                    trim(strip_tags($_POST['phone'])),
                ];

                if (!$clientModel->addClient($clientParams)) {
                    die(json_encode([
                        'text' => 'Не удалось записаться на приём, попробуйте позже',
                        'className' => 'text-danger'
                    ]));
                }

                $client = $clientModel->getClientByEmail($email);
            }

            $receiptDate = trim(strip_tags($_POST['date'])) . " " . trim(strip_tags($_POST['time']));

            $applicationParams = [
                $client['id'],
                date("Y-m-d H:i", strtotime($receiptDate)),
                trim(strip_tags($_POST['service'])),
                trim(strip_tags($_POST['message'])),
                trim(strip_tags($_POST['nickname'])),
                trim(strip_tags($_POST['age'])),
                trim(strip_tags($_POST['weight'])),
                trim(strip_tags($_POST['gender'])),
                date("Y-m-d H:i"),
                date("Y-m-d H:i"),
            ];

            $applicationModel = new Application();
            if (!$applicationModel->createApplication($applicationParams)) {
                die(json_encode([
                    'text' => 'Ошибка при создании заявки',
                    'className' => 'text-danger'
                ]));
            }
        }

        die(json_encode([
            'text' => 'Заявка на прием к ветеринару успешно создана',
            'className' => 'text-success'
        ]));
    }
}