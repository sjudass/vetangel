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
                <h1 class="h2">Список клиентов</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Клиент</th>
                                <th>Почта</th>
                                <th>Телефон</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($clients) && is_array($clients)) {foreach ($clients as $client):?>
                                <tr>
                                    <th scope="row"><?=$client['id'];?></th>
                                    <td><?="{$client['name']} {$client['patronymic']}";?></td>
                                    <td><?=$client['email'];?></td>
                                    <td><?=$client['phone'];?></td>
                                    <td>
                                        <a href="/admin/clientShow/<?=$client['id'];?>">Просмотр</a>
                                    </td>
                                </tr>
                            <?php endforeach;}?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>feather.replace()</script>
</body>
</html>
