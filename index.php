<!DOCTYPE html>
<html lang="ja">
<head>

  <!-- 共通した<head>部分を読み込む -->
  <?php include("common/haed.php"); ?>
  
</head>
<body>

<!-- ヘッダーを読み込む -->
  <?php include("common/header.php"); ?>


  <!-- メイン -->
  <main>
    <section class="hero">
      <h1>あなたのストーリーが、誰かの力になる。</h1>
      <p>つらい経験を言葉にして、優しいつながりをつくる場所。</p>
    </section>

    <!-- つぶやき投稿を表示するエリア -->
    <section class="stories">
      <h2>みんなのストーリー</h2>
      <div id="storyList" class="story-list"></div>
    </section>
  </main>


  <!-- フッダーを読み込む -->
  <?php include("common/footer.php"); ?>


<!-- jsの分割がうまくいかない exportがなぜかはじかれてしまう-->

  <script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.0/firebase-app.js";
    import { getFirestore, collection, getDocs } from "https://www.gstatic.com/firebasejs/10.12.0/firebase-firestore.js";

    const firebaseConfig = {
      apiKey: "AIzaSyBPk5dn2O6aKPvc42CshlAsbFdFloBAFIg",
      authDomain: "storydatabasetest01.firebaseapp.com",
      projectId: "storydatabasetest01",
      storageBucket: "storydatabasetest01.appspot.com",
      messagingSenderId: "1005940837100",
      appId: "1:1005940837100:web:4f49bafa766d8da33973c9"
    };

    const app = initializeApp(firebaseConfig);
    const db = getFirestore(app);

    const storyList = document.getElementById("storyList");

    const snapshot = await getDocs(collection(db, "stories"));
    snapshot.forEach((doc) => {
      const data = doc.data();
      const card = document.createElement("div");
      card.className = "story-card";
      card.innerHTML = `
        <div class="story-section">
          <h3>うつ病になった経緯</h3>
          <p>${data.reason || ""}</p>
        </div>
        <div class="story-section">
          <h3>どんなときがつらかったか</h3>
          <p>${data.pain || ""}</p>
        </div>
        <div class="story-section">
          <h3>どう乗り越えたか／乗り越えたいか</h3>
          <p>${data.recovery || ""}</p>
        </div>
        <div class="story-section">
          <h3>読む人へ伝えたいこと</h3>
          <p>${data.message || ""}</p>
        </div>
      `;
      storyList.appendChild(card);
    });
  </script>
</body>
</html>

