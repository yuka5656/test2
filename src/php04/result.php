<?php
  require_once('config/status_codes.php');
  // ファイルの読み込み

  $answer_code = htmlspecialchars($_POST['answer_code'], ENT_QUOTES);
  $option = htmlspecialchars($_POST['option'], ENT_QUOTES);
  // htmlspecialcharsはエスケープ処理するため
  // ENT_QUOTESは、シングルとダブルクォーテーションも変換対象に含めるようになる

  if (!$option) {
    header('Location: index.php');
  }
  // header(関数)は、別ページに移動させたり、リダイレクトを行ったりする。
  // $option(変数)が存在しない場合(index.phpで解答の選択肢を選ばなかったとき)に、index.phpにリダイレクトするようになる

  foreach ($status_codes as $status_code){
    if ($status_code['code'] === $answer_code){
      $code = $status_code['code'];
      $description = $status_code['description'];
    }
    // if文を使用し解答コードと配列が合致した時のみ必要となるデータの取得を行う
    $result = $option === $code;
    // option(変数)とcode(変数)が合致したものをresult(変数)になる
  }
  
  ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/sanitize.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/result.css">
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a href="/" class="header__logo">
        Status Code Quiz
      </a>
    </div>
  </header>
  
  <main>
    <div class="result__content">
      <div class="result">
        <?php if ($result): ?>
        <h2 class="result__text--correct">正解</h2>
        <?php else: ?>
        <!-- 正解の場合表示 -->
        <h2 class="result__text--incorrect">不正解</h2>
        <?php endif; ?>
        <!-- 不正解の場合表示 -->
      </div>
      <div class="answer-table">
        <table class="answer-table__inner">
          <tr class="answer-table__row">
            <th class="answer-table__header">ステータスコード</th>
            <td class="answer-table__text">
              <?php echo $code ?>
              </td>
          </tr>
          <tr class="answer-table__row">
            <th class="answer-table__header">説明</th>
            <td class="answer-table__text">
              <?php echo $description ?>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </main>

</body>
</html>