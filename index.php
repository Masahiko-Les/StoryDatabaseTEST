<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ストーリー一覧</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php include 'common/header.php'; ?>

  <div class="hero">
    <h1>あなたのストーリーが、誰かの力になる。</h1>
    <p>つらい経験を言葉にして、優しいつながりをつくる場所。</p>
  </div>

  <div class="stories">
    <h2>みんなのストーリー</h2>
    <div class="story-list" id="story-list">読み込み中...</div>
  </div>

  <footer>© 2025 ストーリー・データベース</footer>
  <script type="module" src="load.js"></script>
</body>
</html>
