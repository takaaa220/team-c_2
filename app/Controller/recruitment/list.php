<?php

use Model\Dao\OfferPost;
use Slim\Http\Request;
use Slim\Http\Response;

// クラウドファンディング募集一覧
$app->get('/recruitment', function (Request $request, Response $response, $args) {
    $path = $request->getUri()->getPath();
    $this->session->set('forwarding_path', $path);

    $data = [];

    $query = $_GET;
    $now = array_key_exists("page", $query) ? $query["page"] : 1;

    $offer1 = new OfferPost($this->db);
    $offer4 = new OfferPost($this->db);
    $usr = new OfferPost($this->db);

    if (array_key_exists("type", $query)) {
        $data["type"] = $query["type"];
        $data["result1"] = $offer1->getOfferPostByType($query["type"], $now);
    } else {
        $data["result1"] = $offer1->getOfferPostList($now);
    }

    $data["offerNum"] = $offer4->getAllOfferPostList();
    $data["max"] = ceil( count($data["offerNum"]) / 10 );
    $data["usr"] = $usr->getAllUsrList();
    $data["now"] = $now;

    return $this->view->render($response, 'recruitment/list.twig', $data);

});
