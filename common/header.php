<?php 
  /**
   * タイトルを指定してヘッダーを作成
   * @param $title
   * @return string
   */
  function getHeader($title) {
    return <<< EOF
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Memo_app | {$title}</title>
      <link rel="stylesheet" type="text/css" href="../public/css/main.css" />
      <link rel='stylesheet' href='https://unpkg.com/ress/dist/ress.min.css'>
      <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
      <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    </head>
  EOF;
  }



?>