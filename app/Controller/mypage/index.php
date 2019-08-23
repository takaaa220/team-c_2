<?php

use Model\Dao\Item;
use Slim\Http\Request;
use Slim\Http\Response;

// マイページ (メッセージも受け取るところの想定)
$app->get('/mypage', function (Request $request, Response $response, $args) {
    $this->session->delete('forwarding_path');

    // ログインしてなかったらトップへ
    $user = $this->session->get('user_info');
    if ($user == "") {
        return $response->withRedirect('/');
    }

    $data = [];

    return $this->view->render($response, 'mypage/index.twig', $data);

});
