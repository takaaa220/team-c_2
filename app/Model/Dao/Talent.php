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

    public function getTalentListByCategory($category, $page) {
      $num = ($page-1)*20;

      $sql = "select * from talent_master where id in ((select talent_id from talent_category where category = :category)) limit :num,20 ";

      $statement = $this->db->prepare($sql);

      $statement->bindParam(":num", $num, PDO::PARAM_INT);
      $statement->bindParam(":category", $category, PDO::PARAM_STR);

      $statement->execute();

      return $statement->fetchAll();
    }

    public function searchTalentByName($name, $page) {

      $num = ($page-1)*20;

      $sql = "select * from talent_master where name like :name limit :num,20 ";

      $statement = $this->db->prepare($sql);

      $like = "%$name%";
      $statement->bindParam(":name", $like, PDO::PARAM_STR);
      $statement->bindParam(":num", $num, PDO::PARAM_INT);

      $statement->execute();

      return $statement->fetchAll();
    }
}
