<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Model\Dao\Chat;

// グループ作成画面ページのコントローラ
$app->get('/chat_group/', function (Request $request, Response $response) {

    $data = [];

    // Render index view
    return $this->view->render($response, 'chat_group/index.twig', $data);
});


$app->post('/chat_group/', function (Request $request, Response $response) {

    //POSTされた内容を取得します
    $data = $request->getParsedBody();

    $chat = new Chat($this->db);

    $this->session->set('group_info',$data);

    $param["id"] = $data["id"];

    $result = $chat->select($param,time,DESC,10,true);

    return $this->view->render($response, '/chat_group/index.twig', $result);

});
