<?php

use Slim\Http\Request;
use Slim\Http\Response;

// グループ作成画面ページのコントローラ
$app->get('/make_group/', function (Request $request, Response $response) {

    $data = [];

    // Render index view
    return $this->view->render($response, 'make_group/index.twig', $data);
});

// 会員登録処理コントローラ
$app->post('/make_group/', function (Request $request, Response $response) {

    //POSTされた内容を取得します
    $data = $request->getParsedBody();

    //ユーザーDAOをインスタンス化
    $group = new Group($this->db);

    //DBに登録をする。戻り値は自動発番されたIDが返ってきます
    $id = $group->insert($data);

    //今登録された情報を発番されたIDで引き、会員情報を取得します（会員登録後の自動ログイン処理のため）
    $result = $group->select(array("id" => $id), "", "", 1, false);

    //セッションにユーザー情報を登録（ログイン処理）
    $this->session->set('user_info', $result);

    // 登録完了ページを表示します。
    return $this->view->render($response, 'register/register_done.twig', $data);

});