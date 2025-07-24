import { initializeApp, getApps } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js";
import {
  getFirestore,
  collection,
  addDoc,
  serverTimestamp
} from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";

import {
  getAuth,
  onAuthStateChanged
} from "https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js";

// Firebase config
const firebaseConfig = {
  apiKey: "AIzaSyBPk5dn2O6aKPvc42CshlAsbFdFloBAFIg",
  authDomain: "storydatabasetest01.firebaseapp.com",
  projectId: "storydatabasetest01",
};

// Firebase 初期化
const app = getApps().length === 0 ? initializeApp(firebaseConfig) : getApps()[0];
const db = getFirestore(app);
const auth = getAuth(app);

// ユーザーの認証状態（ログイン・ログアウト）が変化したときに自動的に呼び出されるリスナー
onAuthStateChanged(auth, (user) => {
  const form = document.getElementById("story-form");

  if (user) {
    // ユーザーがログインしている場合
    form.style.display = "block";

  } else {
    // ユーザーがログインしていない場合
    form.style.display = "none";
    alert("ログインしてください");
    window.location.href = "login.php";
  }
});

// 投稿処理
document.getElementById("story-form").addEventListener("submit", async (e) => {
  e.preventDefault();

  const title = document.getElementById("title").value;
  const summary = document.getElementById("summary").value;
  const story = document.getElementById("story").value;

  try {
    await addDoc(collection(db, "stories"), {
      title,
      summary,
      story,
      timestamp: serverTimestamp(),
      uid: auth.currentUser.uid
    });
    alert("ストーリーが投稿されました");    
    document.getElementById("story-form").reset();
  } catch (error) {
    alert("投稿エラー: " + error);
  }
});
