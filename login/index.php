<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
    <?php
        // ファイルの読み込み
        include_once "../common/header.php";
        echo getHeader("ログイン");
    ?>

    <body>
      <div id="container">
        <div class="content">
          <form action="./action/login.php" method="post">
            <div class="form">
              <div class="form__body">
              <?php 
                  if(isset($_SESSION['errors'])) {
                    echo '<div class="alert" role="alert">';
                    foreach($_SESSION['errors'] as $error) {
                      echo "<div class='alert__text'>{$error}</div>";
                    }
                    echo '</div>';
                    unset($_SESSION['errors']);
                  }
                ?>
                <h1 class="form__title">MEMO</h1>
                <div class="form__input">
                  <label class="input-group">
                      <span class="input-group-prepend">
                          <span class="input-group__icon"><i class="far fa-envelope"></i></span>
                      </span>
                      <input type="text" name="user_email" class="form-control" placeholder="メールアドレス" autocomplete="off" maxlength="255" />
                  </label>
                  <label class="input-group">
                      <span class="input-group-prepend">
                          <span class="input-group__icon"><i class="fas fa-key"></i></span>
                      </span>
                      <input type="password" name="user_password" class="form-control" placeholder="パスワード" autocomplete="off" maxlength="255" />
                  </label>
                  <button type="submit" class="form__btn">
                      ログイン
                  </button>
                  <div class="form__text">
                    <p>アカウントをお持ちではありませんか？</p>
                    <a class="form__rink" href="../user/index.php">アカウントを作成</a>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </body>