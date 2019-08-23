<?php

use Model\Dao\Talent;
use Slim\Http\Request;
use Slim\Http\Response;

// 有名人詳細
$app->get('/talent/{talent_id}/', function (Request $request, Response $response, $args) {
    $path = $request->getUri()->getPath();
    $this->session->set('forwarding_path', $path);

    $data = [];
    //URLパラメータのtalent_idを取得します。
    $talent_id = $args["talent_id"];

    $talent = new Talent($this->db);
    $talent2 = new Talent($this->db);

    //URLパラメータのtalent_id部分を引数として渡し、戻り値をresultに格納します
    $data["result"] = $talent->getTalent($talent_id);
    $data["category_result"] = $talent2->getTalentCategory($talent_id);
// dd($data["category_result"]);

    return $this->view->render($response, 'talent/detail.twig', $data);

});
