<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Model\Dao\Community;

// グループ作成画面ページのコントローラ
$app->get('/join_group/', function (Request $request, Response $response) {

    $data = [];

    // Render index view
    return $this->view->render($response, 'join_group/index.twig', $data);
});


$app->post('/join_group/', function (Request $request, Response $response) {

    //POSTされた内容を取得します
    $data = $request->getParsedBody();

    //ユーザーDAOをインスタンス化
    $community = new Community($this->db);

    $param["area"] = $data["area"];

    $result = $community->select($param,event_date,DESC,5,true);

    $info["result"] = $result;

    //dd($result);

    return $this->view->render($response,'result_group/index.twig',$info);

});