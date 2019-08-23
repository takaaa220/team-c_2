<?php
use Model\Dao\Offer_post;
use Slim\Http\Request;
use Slim\Http\Response;
// 不幸一覧 (検索もはいるところ)
$app->get('/offer_post/list', function (Request $request, Response $response, $args) {

  // dd(1234);
      $data = [];

    $post = new Offer_post($this->db);

    $data["result"] = $post->getOfferPostList();
// dd($talent->searchTalentMaster($x));
    //$data["result"] = $talent->searchTalentMaster($x);
    return $this->view->render($response, 'offer_post/list.twig', $data);

});
