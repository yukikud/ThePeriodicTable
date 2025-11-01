  <?php require_once 'header.php'; ?>
  <p><a href="quiz.php">クイズに挑戦！</a></p>

  <div class="periodic-wrapper">
  <div id="periodic-table"></div>
</div>
  <div id="element-detail" class="hidden">
    <span id="close-btn">×</span>
    <h2 id="detail-symbol"></h2>
    <p><strong>name:</strong> <span id="detail-name"></span></p>
    <p><strong>weight:</strong> <span id="detail-weight"></span></p>
    <p><strong>state:</strong> <span id="detail-state"></span></p>
    <p><strong>group:</strong> <span id="detail-group"></span></p>
    <p class="note">
    ※このgroupはわかりやすくした表現です。<br>実際の分類は教科書などで確認してね📘
    </p>
    <p><strong>toxicity:</strong> <span id="detail-toxicity"></span></p>
    <p><a id="detail-wiki" href="#" target="_blank" rel = "noreferrer">Wikipediaで詳しく見る</a></p>
  </div>
    <div class="particles">
    <span class="circle"></span>
    <span class="square"></span>
    <span class="circle"></span>
    <span class="square"></span>
    <!-- ●■ -->
</div>

<?php require_once 'footer.php'; ?>