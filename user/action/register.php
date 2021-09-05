<?php 
  require '../../common/database.php';

  //パラメーター取得
  $user_name = $_POST['user_name'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];

  // DB接続
  $database_handler = getDatabaseConnection();


  try {
    // Usersテーブルにレコードをインサート（クエリ文発行）
    if($statement = $database_handler->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)')) {
      $password = password_hash($user_password, PASSWORD_DEFAULT);

      $statement->bindParam(':name', htmlspecialchars($user_name));
      $statement->bindParam(':email', $user_email);
      $statement->bindParam(':password', $password);
      $statement->execute();
    }
  }
  catch(Throwable $e) {
    echo $e->getMessage();
    exit;
  }

  // メモ投稿画面にリダイレクト
  header('Location: ../../memo/index.php');
  exit;
?>