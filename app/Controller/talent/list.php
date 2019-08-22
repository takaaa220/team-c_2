<?php
use Model\Dao\Talent;
use Slim\Http\Request;
use Slim\Http\Response;
// 有名人一覧 (検索もはいるところ)
$app->get('/talent/list', function (Request $request, Response $response, $args) {

  // dd(1234);
      $data = [];
      //$x = "浅田真央";

    $talent1 = new Talent($this->db);
    $talent2 = new Talent($this->db);

    $data["result1"] = $talent1->getTalentMasterList();
    $data["result2"] = $talent2->getTalentCategoryList();
// dd($talent->searchTalentMaster($x));
    //$data["result"] = $talent->searchTalentMaster($x);

    return $this->view->render($response, 'talent/list.twig', $data);
});
