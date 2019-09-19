<?php

use Slim\Http\Request;
use Slim\Http\Response;

// グループ作成画面ページのコントローラ
$app->get('/profile_setting/', function (Request $request, Response $response) {

    $data = [];

    // Render index view
    return $this->view->render($response, 'profile_setting/index.twig', $data);
});

$app->post('/profile_setting/', function (Request $request, Response $response) {

    //POSTされた内容を取得します
    $data = $request->getParsedBody();

    //ユーザーDAOをインスタンス化
    $group = new User($this->db);

    //DBに登録をする。戻り値は自動発番されたIDが返ってきます
    $id = $group->insert($data);

});