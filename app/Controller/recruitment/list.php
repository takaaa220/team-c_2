<?php

use Model\Dao\Item;
use Slim\Http\Request;
use Slim\Http\Response;

// クラウドファンディング募集一覧
$app->get('/recruitment', function (Request $request, Response $response, $args) {
    $path = $request->getUri()->getPath();
    $this->session->set('forwarding_path', $path);

    $data = [];

    $query = $_GET;
    if (array_key_exists("type", $query)) {
        $data["type"] = $query["type"];
    }

    return $this->view->render($response, 'recruitment/list.twig', $data);

});
