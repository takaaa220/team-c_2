<?php

namespace Model\Dao;

use Doctrine\DBAL\DBALException;
use PDO;

class Talent extends Dao
{
  //talent_master
    public function getTalentMasterList($page)
    {
      $num = ($page-1)*20;
        //全件取得するクエリを作成
        $sql = "select * from talent_master limit :num,20 ";

        // SQLをプリペア
        $statement = $this->db->prepare($sql);

        $statement->bindParam(":num", $num, PDO::PARAM_INT);

        //SQLを実行
        $statement->execute();

        //結果レコードを全件取得し、返送
        return $statement->fetchAll();

    }

    public function getAllTalentMasterList()
    {
        //全件取得するクエリを作成
        $sql = "select * from talent_master ";

        // SQLをプリペア
        $statement = $this->db->prepare($sql);

        //SQLを実行
        $statement->execute();

        //結果レコードを全件取得し、返送
        return $statement->fetchAll();

    }

    public function searchTalentMaster($id)
    {

        //全件取得するクエリを作成
        $sql = "select * from talent_master where id =:id";

        // SQLをプリペア
        $statement = $this->db->prepare($sql);

        //idを指定します
        $statement->bindParam(":id", $id, PDO::PARAM_INT);

        //SQLを実行
        $statement->execute();

        //結果レコードを一件取得し、返送
        return $statement->fetch();

    }

    //talent_category
    public function getTalentCategoryList($page)
    {
      $num = ($page-1)*20;
        //全件取得するクエリを作成
        $sql = "select * from talent_category limit :num,20 ";

        // SQLをプリペア
        $statement = $this->db->prepare($sql);

        $statement->bindParam(":num", $num, PDO::PARAM_INT);

        //SQLを実行
        $statement->execute();

        //結果レコードを全件取得し、返送
        return $statement->fetchAll();

    }
}
