<?php

use Model\Dao\Item;
use Slim\Http\Request;
use Slim\Http\Response;

// クラウドファンディング詳細 (支援するタブがアクティブ）
$app->get('/recruitment/{recruitment_id}', function (Request $request, Response $response, $args) {
    $path = $request->getUri()->getPath();
    $this->session->set('forwarding_path', $path);

    $data = [];

    $data["type"] = "cheering";

    return $this->view->render($response, 'recruitment/detail.twig', $data);

});

// クラウドファンディング詳細 (支援者一覧がアクティブ）
$app->get('/recruitment/{recruitment_id}/cheerer', function (Request $request, Response $response, $args) {
    $path = $request->getUri()->getPath();
    $this->session->set('forwarding_path', $path);

    $data = [];

    $data["type"] = "cheerer";

    return $this->view->render($response, 'recruitment/detail.twig', $data);

});
