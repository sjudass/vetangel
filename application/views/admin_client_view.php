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
                            <a class="nav-link" href="/admin">
                                <span data-feather="file"></span>
                                Заявки
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/admin/clients">
                                <span data-feather="users"></span>
                                Клиенты
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <?php if (!$client): ?>
                    <h1 class="h2">Клиент не найден</h1>
                <?php else:?>
                    <h1 class="h2">Клиент №<?=$client['id']?></h1>
                    <div class="border-top">
                        <div class="row justify-content-md-center">
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="text-center">Информация о клиенте</legend>
                                    <table class="table table-striped mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Имя</th>
                                                <td><?=$client['name'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Отчество</th>
                                                <td><?=$client['patronymic'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Почта</th>
                                                <td><?=$client['email'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Телефон</th>
                                                <td><?=$client['phone'];?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row justify-content-md-center mt-3">
                            <div class="col-md-12 text-right">
                                <a href="/admin/clientUpdateView/<?=$client['id']?>" class="btn btn-success btn-md">Редактировать</a>
                                <a href="/admin/clients" class="btn btn-dark btn-md">Назад</a>
                            </div>
                        </div>
                    </div>

                    <?php if ($applications): ?>
                        <h1 class="h2">Заявки на приём</h1>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Услуга</th>
                                        <th>Питомец</th>
                                        <th>Дата записи</th>
                                        <th>Статус</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($applications) && is_array($applications)) {foreach ($applications as $application):?>
                                        <tr>
                                            <th scope="row"><?=$application['id'];?></th>
                                            <td><?= $application['service'];?></td>
                                            <td><?= $application['pet_name'];?></td>
                                            <td><?= date("d.m.Y H:i", strtotime($application['receipt_date']));?></td>
                                            <td><?= $application['status'];?></td>
                                            <td>
                                                <a href="/admin/applicationShow/<?= $application['id'];?>">Просмотр</a>
                                            </td>
                                        </tr>
                                    <?php endforeach;}?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif;?>
                <?php endif;?>
            </main>
        </div>
    </div>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>feather.replace()</script>
</body>
</html>