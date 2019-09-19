<?php

use Slim\Http\Request;
use Slim\Http\Response;

// グループ作成画面ページのコントローラ
$app->get('/profile_setting/', function (Request $request, Response $response) {

    $data = [];

    // Render index view
    return $this->view->render($response, 'profile_setting/index.twig', $data);
});