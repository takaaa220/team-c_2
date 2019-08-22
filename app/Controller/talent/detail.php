<?php

use Model\Dao\Item;
use Slim\Http\Request;
use Slim\Http\Response;

// 有名人詳細
$app->get('/talent/{talent_id}', function (Request $request, Response $response, $args) {
    $data = [];

    return $this->view->render($response, 'talent/detail.twig', $data);

});
