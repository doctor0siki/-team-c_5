<?php

use Slim\Http\Request;
use Slim\Http\Response;

// グループ作成画面ページのコントローラ
$app->get('/join_group/', function (Request $request, Response $response) {

    $data = [];

    // Render index view
    return $this->view->render($response, 'join_group/index.twig', $data);
});