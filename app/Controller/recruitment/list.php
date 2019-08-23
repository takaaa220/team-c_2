<?php

use Model\Dao\OfferPost;
use Slim\Http\Request;
use Slim\Http\Response;

// クラウドファンディング募集一覧
$app->get('/recruitment', function (Request $request, Response $response, $args) {
    $path = $request->getUri()->getPath();
    $this->session->set('forwarding_path', $path);

    $data = [];

    $offer1 = new OfferPost($this->db);
    $offer4 = new OfferPost($this->db);
    $usr = new OfferPost($this->db);

    if(empty($_SERVER['QUERY_STRING'])){
      $now = 1; // 設定されてない場合は1ページ目にする
    }else{
        $now = $_SERVER['QUERY_STRING'];
    }

    $data["result1"] = $offer1->getOfferPostList($now);

    $data["offerNum"] = $offer4->getAllOfferPostList();
    $data["max"] = ceil( count($data["offerNum"]) / 10 );
    $data["usr"] = $usr->getAllUsrList();
    $data["now"] = $now;

    return $this->view->render($response, 'recruitment/list.twig', $data);

});
