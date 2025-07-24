import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js";
import { 
  getAuth, 
  signInWithEmailAndPassword, 
  createUserWithEmailAndPassword, 
  onAuthStateChanged, 
  signOut 
} from "https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js";

const firebaseConfig = {
  apiKey: "AIzaSyBPk5dn2O6aKPvc42CshlAsbFdFloBAFIg",
  authDomain: "storydatabasetest01.firebaseapp.com",
  projectId: "storydatabasetest01",
};

const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

// 共通：ログイン状態監視してユーザー名表示＋ログアウト切り替え
onAuthStateChanged(auth, (user) => {
  const userInfo = document.getElementById("user-info");
  const logoutBtn = document.getElementById("logout-btn");
  const loginLink = document.getElementById("login-link");
  
  if (user) {
    userInfo.textContent = `ログイン中: ${user.email}`;
    if (logoutBtn) logoutBtn.style.display = "inline-block";
    if (loginLink) loginLink.style.display = "none";
  } else {
    userInfo.textContent = "";
    if (logoutBtn) logoutBtn.style.display = "none";
    if (loginLink) loginLink.style.display = "inline-block";
  }
});

// ログアウト処理
if (document.getElementById("logout-btn")) {
  document.getElementById("logout-btn").addEventListener("click", () => {
    signOut(auth).then(() => {
      location.reload();
    });
  });
}

// ログイン処理
if (document.getElementById("login-btn")) {
  document.getElementById("login-btn").addEventListener("click", async () => {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    try {
      await signInWithEmailAndPassword(auth, email, password);
      document.getElementById("auth-status").textContent = "ログイン成功";
    } catch (e) {
      document.getElementById("auth-status").textContent = "ログイン失敗: " + e.message;
    }
  });
}

// 新規登録処理
if (document.getElementById("register-btn")) {
  document.getElementById("register-btn").addEventListener("click", async () => {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    try {
      await createUserWithEmailAndPassword(auth, email, password);
      document.getElementById("auth-status").textContent = "登録＆ログイン成功";
    } catch (e) {
      document.getElementById("auth-status").textContent = "登録失敗: " + e.message;
    }
  });
}