<?php

namespace Model\Dao;

use Doctrine\DBAL\DBALException;
use PDO;

class Offer_post extends Dao
{
  //talent_master
    public function getOfferPostList()
    {

        //全件取得するクエリを作成
        $sql = "select * from offer_post";

        // SQLをプリペア
        $statement = $this->db->prepare($sql);

        //SQLを実行
        $statement->execute();

        //結果レコードを全件取得し、返送
        return $statement->fetchAll();

    }



}
