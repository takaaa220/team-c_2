<?php

use Model\Dao\OfferPost;
use Slim\Http\Request;
use Slim\Http\Response;

// 有名人詳細
$app->get('/talent/{talent_id}/', function (Request $request, Response $response, $args) {
    $path = $request->getUri()->getPath();
    $this->session->set('forwarding_path', $path);

    $data = [];

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

    $param["usr_id"] = $user["id"];
    $result = $offer_post->create($param);

    if ($result == null) {
        return $response->withRedirect("/talent/${talent_id}/");
    }

    return $response->withRedirect("/talent/${talent_id}/payment");
});

$app->get('/talent/{talent_id}/payment', function (Request $request, Response $response, $args) {
    $data = [];

    return $this->view->render($response, 'talent/payment.twig', $data);
});
