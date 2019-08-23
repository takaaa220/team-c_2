<?php
use Model\Dao\Talent;
use Slim\Http\Request;
use Slim\Http\Response;
// 有名人一覧 (検索もはいるところ)
$app->get('/talent', function (Request $request, Response $response, $args) {

  $path = $request->getUri()->getPath();
  $this->session->set('forwarding_path', $path);

  // dd(1234);
      $data = [];
      //$x = "浅田真央";

    $talent1 = new Talent($this->db);
    $talent2 = new Talent($this->db);
    $talent3 = new Talent($this->db);

    if(!isset($_SERVER['QUERY_STRING'])){ 
        $now = 1; // 設定されてない場合は1ページ目にする
    }else{
        $now = $_SERVER['QUERY_STRING'];
    }
    //$now = $_SERVER['QUERY_STRING'];
    //dd($now);

    $data["result1"] = $talent1->getTalentMasterList($now);
    $data["result2"] = $talent2->getTalentCategoryList($now);
    $data["member"] = $talent3->getAllTalentMasterList();
    $data["max"] = ceil( count($data["member"]) / 20 );
    $data["now"] = $now;

    return $this->view->render($response, 'talent/list.twig', $data);
});
