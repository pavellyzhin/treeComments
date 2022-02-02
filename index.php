<?php

header("Content-Type:text/html");


require_once './other/mysql.php';
require_once './model/comments.model.php';
require_once './controller/comments.controller.php';
require_once './view/comments.view.php';

$mysql = new db((object)['host'=>'localhost','userName'=>'root','password'=>'','dbName'=>'comment']);
$mysql->connect();
$model = new commentsModel($mysql);
$view = new commentsView();
$controller = new commentsController($model,$view);

$model->mysql = $mysql;
$controller->model = $model;
$controller->view = $view;


echo $controller->getAllByPublicationId((object)["publicationId"=>1]);






?>