<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Model\Dao\Community;

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
    $community = new Community($this->db);

    //DBに登録をする。戻り値は自動発番されたIDが返ってきます
    $id = $community->insert($data);

    return $this->view->render($response, 'make_group/done.twig', $data);
});
