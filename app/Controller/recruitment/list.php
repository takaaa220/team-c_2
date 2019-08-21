<?php

use Model\Dao\Item;
use Slim\Http\Request;
use Slim\Http\Response;

// クラウドファンディング募集一覧
$app->get('/recruitment', function (Request $request, Response $response, $args) {
    $data = [];

    return $this->view->render($response, 'recruitment/list.twig', $data);

});
