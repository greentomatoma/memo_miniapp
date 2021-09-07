<?php 

  if(!isset($_SESSION)) {
    session_start();
  }

  /**
   * ログインしているかチェック
   * @return bool
   */
  function isLogin(){
    if(isset($_SESSION['user'])) {
      return true;
    }

    return false;
  }


  /**
   * ログインしているユーザーのユーザー名を取得
   * @return string
   */
  function getLoginUserName() {

    if(isset($_SESSION['user'])) {
      $name = $_SESSION['user']['name'];

      if(7 < mb_strlen($name)) {
        // ユーザー名が７文字以上だったら、8文字目以降を"..."と表記する。
        $name = mb_substr($name, 0, 7). "...";
      }

      return $name;
    }

    return "";
  }

  
  /**
   * ログインしているユーザーのidを取得
   * @return |null
   */
  function getLoginUserId() {
    if(isset($_SESSION['user'])) {
      return $_SESSION['user']['id'];
    }

    return null;
  }

?>