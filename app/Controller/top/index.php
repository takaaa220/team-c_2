<?php

use Slim\Http\Request;
use Slim\Http\Response;

// TOPページのコントローラ
$app->get('/', function (Request $request, Response $response) {

    // ログインしてたらマイページへ
    $user = $this->session->get('user_info');
    if ($user != "") {
        return $response->withRedirect('/mypage');
    }

    $data = [];

    // Render index view
    return $this->view->render($response, 'top/index.twig', $data);
});
