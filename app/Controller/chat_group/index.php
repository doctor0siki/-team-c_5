<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Model\Dao\Group;

// グループ作成画面ページのコントローラ
$app->get('/chat_group/', function (Request $request, Response $response) {

    $data = [];

    // Render index view
    return $this->view->render($response, 'chat_group/index.twig', $data);
});


$app->post('/chat_group/', function (Request $request, Response $response) {

    //POSTされた内容を取得します
    $data = $request->getParsedBody();

    //ユーザーDAOをインスタンス化
    $group = new Group($this->db);

    $result = $group->select($data,date,DESC,5,false);

    return $this->view->render($response, '/', $data);

});
