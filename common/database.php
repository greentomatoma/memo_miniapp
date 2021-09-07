<?php 
  /**
   * PDOを使用してデータベースに接続する
   * @return PDO
   */

  function getDatabaseConnection() {
    try {
      $database_handler = new PDO("mysql:host=localhost;port=8889;dbname=memo_app;" , "root", "root");
    }
    catch(PDOException $e) {
      echo "DB接続に失敗しました。<br />";
      echo $e->getMessage();
      exit;
    }
    return $database_handler;
  }

?>