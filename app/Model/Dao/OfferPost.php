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

  public function getOfferPostList($page)
  {
    $num = ($page-1)*10;
      //全件取得するクエリを作成
      $sql = "select * from offer_post limit :num,10 ";

      // SQLをプリペア
      $statement = $this->db->prepare($sql);

      $statement->bindParam(":num", $num, PDO::PARAM_INT);

      //SQLを実行
      $statement->execute();

      //結果レコードを全件取得し、返送
      return $statement->fetchAll();

  }

  public function getOfferPostByType($type, $page) {
    $num = ($page-1)*10;
    //全件取得するクエリを作成
    $sql = "select * from offer_post where type = :type limit :num,10 ";

    // SQLをプリペア
    $statement = $this->db->prepare($sql);

    $statement->bindParam(":num", $num, PDO::PARAM_INT);
    $statement->bindParam(":type", $type, PDO::PARAM_STR);

    //SQLを実行
    $statement->execute();

    //結果レコードを全件取得し、返送
    return $statement->fetchAll();
  }

  public function getAllOfferPostList()
  {
      //全件取得するクエリを作成
      $sql = "select * from offer_post ";

      // SQLをプリペア
      $statement = $this->db->prepare($sql);

      //SQLを実行
      $statement->execute();

      //結果レコードを全件取得し、返送
      return $statement->fetchAll();

  }

  public function getAllUsrList()
  {
      //全件取得するクエリを作成
      $sql = "select * from usr ";

      // SQLをプリペア
      $statement = $this->db->prepare($sql);

      //SQLを実行
      $statement->execute();

      //結果レコードを全件取得し、返送
      return $statement->fetchAll();

  }
}
