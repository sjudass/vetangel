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
                    <h1 class="h2">Заявка №<?=$application['application_id']?> - Правка</h1>
                    <div class="border-top">
                        <div class="row justify-content-md-center mt-5">
                            <div class="col-md-6">
                                <form method="POST" action="/admin/applicationUpdateAction/<?=$application['application_id']?>">
                                    <fieldset class="p-3">
                                        <legend class="text-center">Данные по заявке</legend>
                                        <div class="form-group row">
                                            <label for="service" class="col-sm-3 col-form-label">Услуга</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id="service" name="service" value="<?=$application['service'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="receipt-date" class="col-sm-3 col-form-label">Дата приёма</label>
                                            <div class="col-sm-9">
                                                <input type="datetime-local" class="form-control" id="receipt-date"
                                                       name="receipt-date" value="<?=strftime('%Y-%m-%dT%H:%M', strtotime($application['receipt_date']));?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="message" class="col-sm-3 col-form-label">Комментарий</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly class="form-control-plaintext" id="message" name="message" value="<?=$application['message'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="status" class="col-sm-3 col-form-label">Статус</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="status" id="status">
                                                    <?php foreach ($statuses as $status): ?>
                                                        <option value="<?=$status?>" <?php if ($status == $application['status']):?>selected<?php endif?>><?=$status?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="text-right mt-3">
                                        <input type="submit" class="btn btn-success btn-md" value="Сохранить">
                                        <a href="/admin/applicationShow/<?=$application['application_id']?>" class="btn btn-dark btn-md">Назад</a>
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