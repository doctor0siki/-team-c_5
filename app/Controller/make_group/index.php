<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Model\Dao\Group;

// グループ作成画面ページのコントローラ
$app->get('/make_group/', function (Request $request, Response $response) {

    $data = [];

    // Render index view
    return $this->view->render($response, 'make_group/index.twig', $data);
});


$app->post('/make_group/', function (Request $request, Response $response) {

    //POSTされた内容を取得します
    $data = $request->getParsedBody();

    //ユーザーDAOをインスタンス化
    $group = new Group($this->db);

    //DBに登録をする。戻り値は自動発番されたIDが返ってきます
    $id = $group->insert($data);

});