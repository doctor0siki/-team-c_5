<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Model\Dao\User;

// グループ作成画面ページのコントローラ
$app->get('/profile_setting/', function (Request $request, Response $response) {

    $data = [];

    $user = new User($this->db);

    //$result = $group->select($data,date,DESC,5,false);

    // Render index view
    return $this->view->render($response, 'profile_setting/index.twig', $data);
});

$app->post('/profile_setting/', function (Request $request, Response $response) {

    $data = $this->session["user_info"];

    //POSTされた内容を取得します
    $upd = $request->getParsedBody();

    $upd["id"] = $data["id"];

    //dd($upd);

    //ユーザーDAOをインスタンス化
    $user = new User($this->db);

    //DB登録に必要ない情報は削除します
    unset($upd["password_re"]);

    //DBに登録をする。戻り値は自動発番されたIDが返ってきます
    $user->update($upd);

    $this->session->set('user_info',$upd);
    
    return $this->view->render($response, 'profile_setting/done.twig', $upd);

});
