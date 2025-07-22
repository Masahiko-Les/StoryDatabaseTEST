<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ストーリー投稿</title>
  <link rel="stylesheet" href="style.css" />

  <!-- Firebase CDN (compat 版) -->
  <script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-app-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-firestore-compat.js"></script>

  <!-- Firebase config & logic -->
  <script src="firebaseConfig.js"></script>
  <script src="script.js" defer></script>
</head>
<body>
  <!-- ヘッダーを読み込む -->
  <?php include("common/header.php"); ?>

  <div class="form-container">
    <h2>ストーリーを投稿する</h2>
    <form>
      <div class="form-group">
        <label for="reason">うつ病になった経緯</label>
        <textarea id="reason" name="reason"></textarea>
      </div>
      <div class="form-group">
        <label for="pain">どんなときがつらかったか</label>
        <textarea id="pain" name="pain"></textarea>
      </div>
      <div class="form-group">
        <label for="recovery">それをどう乗り越えたか／乗り越えたいか</label>
        <textarea id="recovery" name="recovery"></textarea>
      </div>
      <div class="form-group">
        <label for="message">読む人へ伝えたいこと</label>
        <textarea id="message" name="message"></textarea>
      </div>
      <button type="submit" class="submit-button">投稿する</button>
    </form>
  </div>


  <!-- フッダーを読み込む -->
  <?php include("common/footer.php"); ?>

</body>
</html>
