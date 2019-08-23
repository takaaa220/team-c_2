<?php
use Model\Dao\Talent;
use Model\Dao\TalentCategory;

use Slim\Http\Request;
use Slim\Http\Response;
// 有名人一覧 (検索もはいるところ)
$app->get('/talent', function (Request $request, Response $response, $args) {

  $path = $request->getUri()->getPath();
  $this->session->set('forwarding_path', $path);

      $data = [];

    $talent1 = new Talent($this->db);
    $talent2 = new Talent($this->db);
    $talent3 = new Talent($this->db);
    $talent4 = new Talent($this->db);

    $talent_category = new TalentCategory($this->db);

    $query = $_GET;

    $now = array_key_exists("page", $query) ? $query["page"] : 1;

    if (array_key_exists("category", $query)) {
      $data["result1"] = $talent1->getTalentListByCategory($query["category"], $now);
      $data["name"] = $query["category"];
    } elseif (array_key_exists("q", $query)) {
      $data["result1"] = $talent1->searchTalentByName($query["q"], $now);
      $data["name"] = $query["q"];
    } else {
      $data["result1"] = $talent1->getTalentMasterList($now);
    }

    $data["result2"] = $talent2->getTalentCategoryList($now);

    $data["max"] = ceil( count($data["result1"]) / 20 );
    $data["now"] = $now;

    $data["categories"] = $talent_category->getAllCategory();

    return $this->view->render($response, 'talent/list.twig', $data);
});
