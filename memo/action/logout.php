<?php 

  session_start();
  $_SESSION = [];
  // セッションのデータを全て破棄
  session_destroy();

  header('Location: ../../login/');
  exit;

?>