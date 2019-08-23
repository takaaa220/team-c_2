<?php

use Model\Dao\OfferPost;
use Slim\Http\Request;
use Slim\Http\Response;

// クラウドファンディング詳細 (支援するタブがアクティブ）
$app->get('/recruitment/{recruitment_id}', function (Request $request, Response $response, $args) {
    $path = $request->getUri()->getPath();
    $this->session->set('forwarding_path', $path);

    $data = [];

    $data["type"] = "cheering";

    $recruitment_id = $args["recruitment_id"];

    $offer1  = new OfferPost($this->db);
    $offer2  = new OfferPost($this->db);
    $offer3  = new OfferPost($this->db);
    $offer4  = new OfferPost($this->db);
    //$offer2  = new OfferPost($this->db);
    //$data["result"] = $offer->getOfferPostList($now);
    $data["result"] = $offer1->getOfferPost($recruitment_id);
    $data["offer_talent"] = $offer2->getOfferTalent($recruitment_id);
    $data["talent"] = $offer3->getAllTalentMasterList();
    $data["usr"] = $offer4->getAllUsrList();


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
