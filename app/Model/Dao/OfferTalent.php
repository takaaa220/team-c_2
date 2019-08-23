<?php

namespace Model\Dao;

use Doctrine\DBAL\DBALException;
use PDO;

class OfferTalent extends Dao
{
  public function create($post_id, $talent_id) {
    $param = [];
    $param["post_id"] = $post_id;
    $param["talent_id"] = $talent_id;


    return $this->insert($param);
  }
}
