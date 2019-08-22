<?php
use Model\Dao\Item;
use Slim\Http\Request;
use Slim\Http\Response;
// 有名人一覧 (検索もはいるところ)
$app->get('/talent', function (Request $request, Response $response, $args) {
    $data = [];

    $talent = new Talent($this->db);

    $param["name"] = $data[name];
    $param["image"] = $data[image_url];

    $result = $talent->select($param, "", "",$num,false)

    $data["result"] = $item->getTalentList();

    return $this->view->render($response, 'talent/list.twig', $data);
});
