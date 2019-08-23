<?php

namespace Model\Dao;

use Doctrine\DBAL\DBALException;
use PDO;

class OfferPost extends Dao
{
  public function create(array $params) {
    if (!$this->validate($params)) {
      return;
    }

    return $this->insert($params);
  }

  function validate(array $params) {
    return $params["usr_id"] != null && $params["type"] != null && $params["content"] != null && $params["content"] != "";
  }
}
