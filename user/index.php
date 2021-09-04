<!DOCTYPE html>
<html lang="ja">
    <?php
        // ファイルの読み込み
        include_once "../common/header.php";
        echo getHeader("ユーザー登録");
    ?>

    <body>
      <div id="container">
        <div class="content">
          <form action="../memo/" method="post">
            <div class="form">
              <div class="form__image">
                <img src="#">
              </div>
              <div class="form__body">
                <h1 class="form__title">MEMO</h1>
                <div class="form__input">
                  <label class="input-group">
                      <span class="input-group-prepend">
                          <span class="input-group__icon"><i class="fas fa-file-signature"></i></span>
                      </span>
                      <input type="text" name="user_name" class="form-control" placeholder="ユーザー名" autocomplete="off" maxlength="255" />
                  </label>
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
                      登録する
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </body>