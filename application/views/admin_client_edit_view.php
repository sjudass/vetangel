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
                <?php if (!$client): ?>
                    <h1 class="h2">Клиент не найден</h1>
                <?php else:?>
                    <h1 class="h2">Клиент №<?=$client['id']?> - Правка</h1>
                    <div class="border-top">
                        <div class="row justify-content-md-center mt-5">
                            <div class="col-md-6">
                                <form method="POST" action="/admin/clientUpdateAction/<?=$client['id']?>">
                                    <fieldset class="p-3">
                                        <legend class="text-center">Данные по клиенту</legend>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Имя</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="name" name="name" value="<?=$client['name'];?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="patronymic" class="col-sm-3 col-form-label">Отчество</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="patronymic" name="patronymic" value="<?=$client['patronymic'];?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="message" class="col-sm-3 col-form-label">Почта</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="email" name="email" value="<?=$client['email'];?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone" class="col-sm-3 col-form-label">Телефон</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="phone" name="phone" value="<?=$client['phone'];?>" required>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="text-right mt-3">
                                        <input type="submit" class="btn btn-success btn-md" value="Сохранить">
                                        <a href="/admin/clientShow/<?=$client['id']?>" class="btn btn-dark btn-md">Назад</a>
                                    </div>
                                </form>
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