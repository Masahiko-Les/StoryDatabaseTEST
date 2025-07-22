document.addEventListener("DOMContentLoaded", async () => {
  // Firebaseの設定をPHPから取得
  const firebaseConfig = await fetchFirebaseConfig();
  if (!firebaseConfig?.apiKey) return;

  // Firebase初期化
  const app = firebase.initializeApp(firebaseConfig);
  const db = firebase.firestore();

  // 投稿フォーム処理
  setupFormHandler(db);

  // ストーリー表示処理
  displayStories(db);
});

// Firebase設定を取得する関数
async function fetchFirebaseConfig() {
  try {
    const res = await fetch('/api/get-config.php');
    if (!res.ok) throw new Error('Firebase設定の取得に失敗');
    return await res.json();
  } catch (err) {
    console.error('設定取得エラー:', err);
    alert("Firebase設定の読み込みに失敗しました。");
    return null;
  }
}

// 投稿フォーム処理
function setupFormHandler(db) {
  const form = document.querySelector("form");
  if (!form) return;

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const reason = document.getElementById("reason").value;
    const pain = document.getElementById("pain").value;
    const recovery = document.getElementById("recovery").value;
    const message = document.getElementById("message").value;

    try {
      await db.collection("stories").add({
        reason,
        pain,
        recovery,
        message,
        createdAt: new Date()
      });
      alert("投稿が完了しました！");
      form.reset();
    } catch (error) {
      console.error("Firestore 書き込みエラー:", error);
      alert("エラーが発生しました。");
    }
  });
}

// ストーリー一覧表示
async function displayStories(db) {
  const storyList = document.getElementById("storyList");
  if (!storyList) return;

  try {
    const snapshot = await db.collection("stories").orderBy("createdAt", "desc").get();
    snapshot.forEach((doc) => {
      const data = doc.data();
      const card = document.createElement("div");
      card.className = "story-card";
      card.innerHTML = `
        <h3>うつ病になった経緯</h3><p>${data.reason || ""}</p>
        <h3>どんなときがつらかったか</h3><p>${data.pain || ""}</p>
        <h3>どう乗り越えたか／乗り越えたいか</h3><p>${data.recovery || ""}</p>
        <h3>読む人へ伝えたいこと</h3><p>${data.message || ""}</p>
      `;
      storyList.appendChild(card);
    });
  } catch (err) {
    console.error("Firestore 読み込みエラー:", err);
    alert("ストーリーの取得に失敗しました。");
  }
}
