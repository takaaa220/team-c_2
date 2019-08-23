<?php

namespace Model\Dao;

use Doctrine\DBAL\DBALException;
use PDO;

class Mypage extends Dao
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

    public function paging($data){
      $num = count($data); // トータルデータ件数
      $max = 1 + count($data)/20;

      if(empty($_GET['page_id'])){ // $_GET['page_id'] はURLに渡された現在のページ数
          $now = 1; // 設定されてない場合は1ページ目にする
      }else{
          $now = $_GET['page_id'];
      }

      for($i = 1; $i <= $max; $i++){ // 最大ページ数分リンクを作成
          if ($i == $now) { // 現在表示中のページ数の場合はリンクを貼らない
              echo $now. '　';
          } else {
              echo '<a href=\'/test.php?page_id='. $i. '\')>'. $i. '</a>'. '　';
          }
      }
    }

}
