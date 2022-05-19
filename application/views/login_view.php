<!DOCTYPE html>
<html lang="ru">
<head>
    <title>«ВетАнгел» - Админ панель</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid bg-cover" style="background-image: url('/images/jumbotron.jpg'); background-size: cover;">
        <div class="d-flex align-items-center justify-content-center" style="height: 100vh">
            <form class="form-signin" role="form" method="post" action="/admin/login">
                <h1 class="text-light px-5">Авторизация</h1>
                <div class="row">
                    <div class="form-group col-md-12 contact-form">
                        <input type="text" name="login" class="form-control my-3" id="login" placeholder="Введите логин" required autofocus>
                        <input type="password" name="password" class="form-control my-3" id="password" placeholder="Введите пароль" required>
                        <input type="submit" class="btn btn-md btn-primary btn-block h3" value="Войти">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>