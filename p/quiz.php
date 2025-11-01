<?php require_once 'header.php'; ?>

<form method="POST" action="quiz.php">
  <div class="form-group">
    <label for="number">元素番号（1〜118）:</label>
    <input type="number" name="number" id="number" required>
  </div>

  <div class="form-group">
    <label for="symbol">元素記号:</label>
    <input type="text" name="symbol" id="symbol" required>
  </div>

  <div class="form-group">
    <label for="name">和名:</label>
    <input type="text" name="name" id="name" required>
  </div>

  <button type="submit">解答</button>
</form>

<?php
$resultMessage = "";

// フォームが送信されたときだけ処理を実行
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // 入力値を取得（issetで安全に）
  $number = isset($_POST["number"]) ? intval($_POST["number"]) : null;
  $symbol = isset($_POST["symbol"]) ? trim($_POST["symbol"]) : "";
  $name = isset($_POST["name"]) ? trim($_POST["name"]) : "";

  // JSONファイルを読み込む
  $json = file_get_contents("js/elements.json");
  $elements = json_decode($json, true); // trueで連想配列に

  // 該当する元素を探す
  $found = null;
  foreach ($elements as $element) {
    if ($element["number"] === $number) {
      $found = $element;
      break;
    }
  }

  // 判定
  if ($found) {
    $isSymbolCorrect = strtolower($found["symbol"]) === strtolower($symbol);
    $isNameCorrect = $found["name"] === $name;

    if ($isSymbolCorrect && $isNameCorrect) {
      $resultMessage = "正解！「{$found['symbol']} / {$found['name']}」だね!!";
    } else {
      $resultMessage = "不正解 正しくは「{$found['symbol']} / {$found['name']}」だよ、覚えてね";
    }
  } else {
    $resultMessage = "その番号の元素は見つからなかった"; // 念の為
  }
}

// 結果を表示
if ($resultMessage !== "") {
  echo "<div class=\"result\">{$resultMessage}</div>";
}
?>

<p><a href="index.php">周期表に戻る</a></p>

<?php require_once 'footer.php'; ?>