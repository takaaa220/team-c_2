<?php

$app->get('/talent', function (Request $request, Response $response, $args) {
    $data = [];

    $talent = new Talent($this->db);

    $param["name"] = $data[name];
    $param["image"] = $data[image_url];

    $result = $talent->select($param, "", "",$num,false)

    $data["result"] = $item->getTalentList();

    return $this->view->render($response, 'talent/list.twig', $data);
});
