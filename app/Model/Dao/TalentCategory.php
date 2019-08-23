<?php

namespace Model\Dao;

use Doctrine\DBAL\DBALException;
use PDO;

class TalentCategory extends Dao
{
  //talent_master
  public function getAllCategory() {
    $sql = "select count(*) as total, category from talent_category group by category order by total desc";

    $statement = $this->db->prepare($sql);
    $statement->execute();

    return $statement->fetchAll();
  }
}
