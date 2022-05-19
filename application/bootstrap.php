<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
require_once 'core/db.php';
require_once 'core/auth.php';
require_once 'models/model_user.php';
require_once 'models/model_application.php';
require_once 'models/model_client.php';
Route::start(); //Запускаем маршрутизатор