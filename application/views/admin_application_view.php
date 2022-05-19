<!DOCTYPE html>
<html lang="ru">
<head>
    <title>«ВетАнгел» - Админ панель</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">«ВетАнгел»</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="/admin/logout">Выйти</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="/admin">
                                <span data-feather="file"></span>
                                Заявки
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/clients">
                                <span data-feather="users"></span>
                                Клиенты
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <?php if (!$application): ?>
                    <h1 class="h2">Заявка не найдена</h1>
                <?php else:?>
                    <h1 class="h2">Заявка №<?=$application['application_id']?></h1>
                    <div class="border-top">
                        <div class="row justify-content-md-center">
                            <div class="col-md-6">
                                <fieldset>
                                    <legend class="text-center">Информация о клиенте</legend>
                                    <table class="table table-striped mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Имя</th>
                                                <td><?= $application['name'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Отчество</th>
                                                <td><?= $application['patronymic'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Почта</th>
                                                <td><?= $application['email'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Телефон</th>
                                                <td><?= $application['phone'];?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <legend class="text-center">Информация о питомце</legend>
                                    <table class="table table-striped mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Кличка</th>
                                                <td><?= $application['pet_name'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Возраст</th>
                                                <td><?= $application['pet_age'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Вес</th>
                                                <td><?= $application['pet_weight'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Пол</th>
                                                <td><?= $application['pet_gender'];?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="text-center">Информация о заявке</legend>
                                    <table class="table table-striped mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Услуга</th>
                                                <td><?=$application['service'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Дата приёма</th>
                                                <td><?=date("d.m.Y H:i", strtotime($application['receipt_date']));?></td>
                                            </tr>
                                            <tr>
                                                <td>Комментарий</th>
                                                <td><?=$application['message'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Статус</th>
                                                <td><?= $application['status'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Дата создания</th>
                                                <td><?=date("d.m.Y H:i", strtotime($application['created_at']));?></td>
                                            </tr>
                                            <tr>
                                                <td>Дата правки</th>
                                                <td><?=date("d.m.Y H:i", strtotime($application['updated_at']));?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row justify-content-md-center mt-3">
                            <div class="col-md-12 text-right">
                                <?php if (!in_array($application['status'], ['Выполнена', 'Отменена'])): ?>
                                    <a href="/admin/applicationUpdateView/<?=$application['application_id']?>" class="btn btn-success btn-md">Внести изменения</a>
                                <?php endif;?>
                                <a href="/admin/applicationDelete/<?=$application['application_id']?>" class="btn btn-danger btn-md">Удалить</a>
                                <a href="/admin" class="btn btn-dark btn-md">Назад</a>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
            </main>
        </div>
    </div>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>feather.replace()</script>
</body>
</html>