<?php

use Model\Dao\TalentDetail;
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
