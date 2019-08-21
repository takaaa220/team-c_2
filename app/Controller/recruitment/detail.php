<?php

use Model\Dao\Item;
use Slim\Http\Request;
use Slim\Http\Response;

// クラウドファンディング詳細
$app->get('/recruitment/{recruitment_id}', function (Request $request, Response $response, $args) {
    $data = [];

    return $this->view->render($response, 'recruitment_id/detail.twig', $data);

});
