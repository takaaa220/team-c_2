<?php

namespace Model\Dao;

use Doctrine\DBAL\DBALException;
use PDO;

class Talent extends Dao
{
  //talent_master
    public function getTalentMasterList()
    {

        //全件取得するクエリを作成
        $sql = "select * from talent_master";

        // SQLをプリペア
        $statement = $this->db->prepare($sql);

        //SQLを実行
        $statement->execute();

        //結果レコードを全件取得し、返送
        return $statement->fetchAll();

    }

    public function searchTalentMaster($name)
    {

        //全件取得するクエリを作成
        $sql = "select * from talent_master where name =:name";

        // SQLをプリペア
        $statement = $this->db->prepare($sql);

        //idを指定します
        $statement->bindParam(":name", $name, PDO::PARAM_INT);

        //SQLを実行
        $statement->execute();

        //結果レコードを一件取得し、返送
        return $statement->fetch();

    }

    //talent_category
    public function getTalentCategoryList()
    {

        //全件取得するクエリを作成
        $sql = "select * from talent_category";

        // SQLをプリペア
        $statement = $this->db->prepare($sql);

        //SQLを実行
        $statement->execute();

        //結果レコードを全件取得し、返送
        return $statement->fetchAll();

    }

}
