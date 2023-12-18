<?php

require_once('config/status_codes.php');
// ファイル(status_codes.php)を読み込む
// index.phpでランダムに取得を行うためrequire_once式を使用


$random_numbers = array_rand($status_codes, 4);
// array_rand(関数)を用いてrandom_numbers(変数)に、配列をランダムに４つ格納される。
// array_rand(関数)は配列のキーをランダムに取り出す。

// ! status_codesから４つの配列(キー)がランダムに選ばれる
foreach ($random_numbers as $index){
$options[] = $status_codes[$index];
// ランダムに４つの選択肢を作成する
// ? ランダムに取得された配列のキー０から３番目の要素を、新しく作成した配列に代入すると選択肢用の配列を作成できる。

}

$question = $options[mt_rand(0, 3)];
// optionsの中から一つを正解として新しい配列(question)に代入する
// mt_randは乱数を生成する
// (0,3)は(最小値,最大値)になる

// ! 正解1つ不正解３つをランダム(シャッフル)に配置される
?>
<!-- require_onceはファイルがすでに読み込まれているかどうかをphpがチェックする。すでに読み込まれている場合は読み込まない -->
<!-- foreach文は、配列又は連想配列に対して先頭のデータから順に繰り返し処理をする
asの後ろの変数にループの度にデータが先頭から順に代入される -->
<!-- 乱数とは、規則性がない値のこと -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Code Quiz</title>
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/index.css">
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
        <div class="quiz__content">
            <div class="question">
                <p class="question__text">Q.以下の内容に当てはまるステータスコードを選んでください</p>
                <p class="question__text">
                  <?php echo $question['description'] ?>
                </p>
            </div>
            <form class="quiz-form" action="result.php" method="post">

                <input type="hidden" name="answer_code" value="<?php echo $question['code'] ?>">
                <!-- type='hidden'はブラウザに表示させない。　記述することでブラウザに表示させず、データの送信を行うことができる。 -->

                <div class="quiz-from__item">
                    <?php foreach ($options as $option) : ?>
                    <div class="quiz-form__group">
                        <input type="radio" class="quiz-from__radio" id="<?php echo $option['code'] ?>"  name="option" value="<?php echo $option['code'] ?>">
                        <label for="<?php echo $option['code'] ?>" class="quiz-form__label">
                        <?php echo $option['code'] ?>
                        </label>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="quiz-form__button">
                    <button class="quiz-from__button-submit" type="submit">
                        回答
                    </button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>