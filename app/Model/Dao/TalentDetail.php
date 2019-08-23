<?php

namespace Model\Dao;

use Doctrine\DBAL\DBALException;
use PDO;

class TalentDetail extends Dao
{

    public function getTalent($id)
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

    public function getTalentCategory($id){

      //全件取得するクエリを作成
      $sql = "select * from talent_category where talent_id =:id";

      // SQLをプリペア
      $statement = $this->db->prepare($sql);

      //idを指定します
      $statement->bindParam(":id", $id, PDO::PARAM_INT);

      //SQLを実行
      $statement->execute();

      //結果レコードを全件取得し、返送
      return $statement->fetchAll();

    }


}
