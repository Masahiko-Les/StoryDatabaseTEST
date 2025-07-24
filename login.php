<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ログイン／登録</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php include 'common/header.php'; ?>
  
<div class="form-container">
  <h2>ログインまたは新規登録</h2>
  <div class="form-group">
    <label for="email">メールアドレス</label>
    <input type="email" id="email" required>
  </div>
  <div class="form-group">
    <label for="password">パスワード</label>
    <input type="password" id="password" required>
  </div>
  <button id="login-btn" class="submit-button">ログイン</button>
  <button id="register-btn" class="submit-button">新規登録</button>
  <div id="auth-status"></div>
</div>



  <footer>© 2025 ストーリー・データベース</footer>
</body>
</html>
