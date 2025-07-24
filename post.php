<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ストーリー投稿</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php include 'common/header.php'; ?>
  
<div class="form-container" id="form-container">
  <h2>ストーリーを投稿する</h2>
  <form id="story-form">
    <div class="form-group">
      <label for="title">タイトル</label>
      <input type="text" id="title" required>
    </div>
    <div class="form-group">
      <label for="summary">要約</label>
      <textarea id="summary" required></textarea>
    </div>
    <div class="form-group">
      <label for="story">本文</label>
      <textarea id="story" required></textarea>
    </div>
    <button type="submit" class="submit-button">投稿する</button>
  </form>
  <div id="status"></div>
</div>

<div class="form-container" id="login-warning" style="display:none;">
  <p>投稿にはログインが必要です。<a href="login.php">こちら</a>からログインしてください。</p>
</div>

<script type="module" src="post.js"></script>

  <footer>© 2025 ストーリー・データベース</footer>
</body>
</html>
