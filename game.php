<?php

// ユーザーに最小値と最大値を入力させる
fwrite(STDOUT, "最小数を入力してください: ");
$n = trim(fgets(STDIN));
fwrite(STDOUT, "最大数を入力してください: ");
$m = trim(fgets(STDIN));

// 入力値が数字であり、かつ最小値が最大値以下であることを確認
if (!is_numeric($n) || !is_numeric($m) || $n >= $m) {
    fwrite(STDERR, "エラー: 不正な入力です。最小数は最大数より小さくなければなりません。\n");
    exit(1);
}

// n から m の範囲内で乱数を生成
$targetNumber = random_int((int)$n, (int)$m);
$attempts = 0; // 試行回数のカウント
$maxAttempts = 5; // 最大試行回数

echo "数字を推測してください (試行回数: {$maxAttempts}回): ";

while ($attempts < $maxAttempts) {
    $guess = trim(fgets(STDIN));
    $attempts++;

    if (!is_numeric($guess)) {
        echo "数字を入力してください。\n";
        continue;
    }

    if ((int)$guess === $targetNumber) {
        echo "正解です！ {$attempts} 回目で正解しました。\n";
        exit(0);
    } elseif ((int)$guess < $targetNumber) {
        echo "もっと大きい数字です。\n";
    } else {
        echo "もっと小さい数字です。\n";
    }

    if ($attempts < $maxAttempts) {
        echo "もう一度試してください: ";
    }
}

echo "残念でした。正解は {$targetNumber} でした。\n";
