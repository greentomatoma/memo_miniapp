<?php

    require '../common/auth.php';
    require '../common/database.php';

    if (!isLogin()) {
      header('Location: ../login/');
      exit;
    }

    $user_name = getLoginUserName();
    $user_id = getLoginUserId();

    $memos = [];
    $database_handler = getDatabaseConnection();
    if($statement = $database_handler->prepare("SELECT id, title, content, updated_at FROM memos WHERE user_id = :user_id ORDER BY updated_at DESC")) {
        $statement->bindParam(':user_id', $user_id);
        $statement->execute();

        // データの取得結果を添字がカラム名の連想配列としている
        while($result = $statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($memos, $result);
        }
    }

    $edit_id = "";
    if(isset($_SESSION['select_memo'])) {
        $edit_memo = $_SESSION['select_memo'];
        $edit_id = empty($edit_memo['id']) ? "" : $edit_memo['id'];
        $edit_title = empty($edit_memo['title']) ? "" : $edit_memo['title'];
        $edit_content = empty($edit_memo['content']) ? "" : $edit_memo['content'];
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
                          <?php echo $user_name; ?> さん、こんにちは。
                      </div>
                      <div class="memo-list__btn">
                          <div class="icon">
                              <a href="./action/add.php" class="btn plus"><i class="fas fa-plus"></i></a>
                              <span class="hover-menu">メモ新規作成</span>
                          </div>
                          <div class="icon">
                              <a href="./action/logout.php" class="btn sign-out"><i class="fas fa-sign-out-alt"></i></a>
                              <span class="hover-menu">ログアウト</span>
                          </div>
                      </div>
                  </div>
                  <div class="memo-list__title">
                      メモリスト
                  </div>
                  <div class="memo-list__items">
                      
                      <?php if(empty($memos)): ?>
                        <div class="no-info">
                            <i class="far fa-surprise"></i>メモがありません。
                        </div>
                      <?php endif; ?>
                      <?php foreach($memos as $memo): ?>
                      <a href="./action/select.php?id=<?php echo $memo['id']; ?>" class="memo-list__item">
                          <div class="item-content <?php echo $edit_id == $memo['id'] ? 'active' : ''; ?>">
                            <div class="content-top">
                              <h5 class="mb-1"><?php echo $memo['title']; ?></h5>
                              <small><?php echo date('Y/m/d H:i', strtotime($memo['updated_at'])); ?></small>
                            </div>
                            <div class="content-text">
                                <p>
                                    <?php 
                                    if(mb_strlen($memo['content']) <= 100) {
                                        echo $memo['content'];
                                    } else {
                                        echo mb_substr($memo['content'], 0, 100) . "...";
                                    }
                                    ?>
                                </p>
                            </div>
                          </div>
                      </a>
                      <?php endforeach; ?>
                  </div>
              </div>
              <div class="memo-input">
                  <?php  if(isset($_SESSION['select_memo'])): ?>
                    <form class="input" method="post">
                        <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>" />
                        <div class="input__menu">
                            <div id="trash" class="icon">
                                <button type="submit" class="btn trash"><i class="fas fa-trash-alt"></i></button>
                                <span class="hover-menu">削除</span>
                            </div>
                            <div class="icon">
                                <button type="submit" class="btn save" formaction="./action/update.php"><i class="fas fa-save"></i></button>
                                <span class="hover-menu">保存</span>
                            </div>
                        </div>
                        <input type="text" id="memo-title" class="input__title" name="edit_title" placeholder="タイトルを入力する..." value="<?php echo $edit_title; ?>" />
                        <textarea id="memo-content" name="edit_content" class="input__content" placeholder="内容を入力する..."><?php echo $edit_content; ?></textarea>
                    </form>
                    
                    <!-- 削除モーダル -->
                    <div class="delete" id="delete-modal" method="post">
                        <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>" />
                        <form class="delete-modal">
                            「 <?php echo $edit_title; ?> 」を本当に削除しますか？
                            <div class="modal-text">
                                <div class="close-modal">
                                    キャンセル
                                </div>
                                <div class="delete-btn">
                                    <button type="submit" formaction="./action/delete.php">削除</button>
                                </div>
                            </div>
                        </form>
                    </div>
                  <?php else: ?>
                    <div class="no-info">
                        <i class="fas fa-info-circle"></i>メモを新規作成するか選択してください。
                    </div>
                  <?php endif ?>
              </div>
          </div>
      </div>
      <script defer src="../public/js/all.js"></script>
    </body>
</html>