<?php

use Model\Dao\Item;
use Slim\Http\Request;
use Slim\Http\Response;

// 有名人一覧 (検索もはいるところ)
$app->get('/talent', function (Request $request, Response $response, $args) {
    $data = [];

    return $this->view->render($response, 'talent/list.twig', $data);

});
