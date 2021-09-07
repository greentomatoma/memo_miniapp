<?php
    require '../common/auth.php';

    if (!isLogin()) {
      header('Location: ../login/');
      exit;
    }  
?>

<!DOCTYPE html>
<html lang="ja">    
    <?php
        include_once "../common/header.php";
        echo getHeader("メモ投稿");
    ?>  
    <body>
      <div id="container">
          <div class="memo">
              <div class="memo-list">
                  <div class="memo-list__top">
                      <div class="user-name">
                          xxxさん、こんにちは。
                      </div>
                      <div class="memo-list__btn">
                          <a href="#" class="btn plus"><i class="fas fa-plus"></i></a>
                          <a href="../login/" class="btn sign-out"><i class="fas fa-sign-out-alt"></i></a>
                      </div>
                  </div>
                  <div class="memo-list__title">
                      メモリスト
                  </div>
                  <div class="memo-list__items">
                      <a href="#" class="memo-list__item">
                          <div class="d-flex w-100 justify-content-between">
                              <h5 class="mb-1">メモタイトル1</h5>
                              <small>2020/08/01 09:00</small>
                          </div>
                          <p class="mb-1">
                              メモ詳細1
                          </p>
                      </a>
                      <a href="#" class="memo-list__item">
                          <div class="d-flex w-100 justify-content-between">
                              <h5 class="mb-1">メモタイトル2</h5>
                              <small>2020/08/01 09:00</small>
                          </div>
                          <p class="mb-1">
                              メモ詳細2
                          </p>
                      </a>
                      <a href="#" class="memo-list__item">
                          <div class="d-flex w-100 justify-content-between">
                              <h5 class="mb-1">メモタイトル3</h5>
                              <small>2020/08/01 09:00</small>
                          </div>
                          <p class="mb-1">
                              メモ詳細3
                          </p>
                      </a>
                  </div>
              </div>
              <div class="memo-input">
                  <form class="input" method="post">
                      <input type="hidden" name="edit_id" value="" />
                      <div class="input__menu">
                          <button type="submit" class="btn trash" formaction=""><i class="fas fa-trash-alt"></i></button>
                          <button type="submit" class="btn save" formaction=""><i class="fas fa-save"></i></button>
                      </div>
                      <input type="text" id="memo-title" class="input__title" name="edit_title" placeholder="タイトルを入力する..." value="" />
                      <textarea id="memo-content" name="edit_content" class="input__content" placeholder="内容を入力する..."></textarea>
                  </form>
              </div>
          </div>
      </div>
    </body>
</html>