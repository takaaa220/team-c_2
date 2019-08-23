<?php

use Model\Dao\TalentDetail;
use Model\Dao\OfferPost;
use Model\Dao\OfferTalent;

use Slim\Http\Request;
use Slim\Http\Response;

// 有名人詳細
$app->get('/talent/detail/{talent_id}', function (Request $request, Response $response, $args) {
    $data = [];
    //URLパラメータのtalent_idを取得します。
    $talent_id = $args["talent_id"];

    $talent = new TalentDetail($this->db);
    $talent2 = new TalentDetail($this->db);

    //URLパラメータのtalent_id部分を引数として渡し、戻り値をresultに格納します
    $data["result"] = $talent->getTalent($talent_id);
    $data["category_result"] = $talent2->getTalentCategory($talent_id);

    return $this->view->render($response, 'talent/detail.twig', $data);

});

$app->post('/talent/{talent_id}/apply', function (Request $request, Response $response, $args) {
    $talent_id = $args["talent_id"];
    $param = $request->getParsedBody();

    // ログインなかったらトップへ
    $user = $this->session->get('user_info');
    if ($user == "") {
        return $response->withRedirect('/');
    }

    $offer_post = new OfferPost($this->db);
    $offer_talent = new OfferTalent($this->db);

    $param["usr_id"] = $user["id"];
    $result_offer_post_id = $offer_post->create($param);

    if ($result_offer_post_id == null) {
        return $response->withRedirect("/talent/${talent_id}/");
    }

    $result_offer_talent_id = $offer_talent->create($result_offer_post_id, $talent_id);

    if ($result_offer_talent_id == null) {
        return $response->withRedirect("/talent/${talent_id}/");
    }

    return $response->withRedirect("/talent/${talent_id}/payment");
});

$app->get('/talent/{talent_id}/payment', function (Request $request, Response $response, $args) {
    $data = [];

    return $this->view->render($response, 'talent/payment.twig', $data);
});
