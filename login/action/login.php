<?php 
  session_start();

  require '../../common/validation.php';
  require '../../common/database.php';

  // パラメータ取得
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];


  // バリデーション
  $_SESSION['errors'] = [];

  // 空チェック
  emptyCheck($_SESSION['errors'], $user_email, "メールアドレスを入力してください。");
  emptyCheck($_SESSION['errors'], $user_password, "パスワードを入力してください。");
  

  // 文字数チェック
  stringMaxSizeCheck($_SESSION['errors'], $user_email, "メールアドレスは255文字以内で入力してください。");
  stringMaxSizeCheck($_SESSION['errors'], $user_password, "パスワードは255文字以内で入力してください。");
  stringMinSizeCheck($_SESSION['errors'], $user_password, "パスワードは8文字以上で入力してください。");

  if(!$_SESSION['errors']) {
    // メールアドレスチェック
    mailAddressCheck($_SESSION['errors'], $user_email, "正しいメールアドレスを入力してください。");

    // パスワード、半角英数字チェック
    halfAlphanumericCheck($_SESSION['errors'], $user_password, "パスワードは半角英数字で入力してください。");
  }


  // エラーメッセージが格納されていればログイン画面へリダイレクト
  if($_SESSION['errors']) {
    header('Location: ../../login/');
    exit;
  }


  // DB接続
  $database_handler = getDatabaseConnection();
  if($statement = $database_handler->prepare('SELECT id, name, password FROM users WHERE email = :user_email')) {
    $statement->bindParam(':user_email', $user_email);
    $statement->execute();

    // 取得した値を$userに代入
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    // $userに値がない場合
    if(!$user) {
      $_SESSION['errors'] = [
        'メールアドレスまたはパスワードが間違っています。'
      ];
      header('Location: ../../login/');
      exit;
    }

    // $userに値がある場合
    // nameとidをそれぞれ格納
    $name = $user['name'];
    $id = $user['id'];

    // 入力されたパスワードが正しいか判定
    if(password_verify($user_password, $user['password'])) {
      
      // ユーザー情報保持
      $_SESSION['user'] = [
        'name' => $name,
        'id' => $id,
      ];
      // メモ投稿画面へリダイレクト
      header('Location: ../../memo/');
      exit;

    } else {
      $_SESSION['errors'] = [
        'メールアドレスまたはパスワードが間違っています。'
      ];
      header('Location: ../../login/');
      exit;

    }
  }

?>