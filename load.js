import { initializeApp, getApps } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js";
import {
  getFirestore,
  collection,
  getDocs,
  query,
  orderBy
} from "https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore.js";

const firebaseConfig = {
  apiKey: "AIzaSyBPk5dn2O6aKPvc42CshlAsbFdFloBAFIg",
  authDomain: "storydatabasetest01.firebaseapp.com",
  projectId: "storydatabasetest01",
};

const app = getApps().length === 0 ? initializeApp(firebaseConfig) : getApps()[0];
const db = getFirestore(app);

const storyList = document.getElementById("story-list");

async function loadStories() {
  storyList.innerHTML = "";
  const q = query(collection(db, "stories"), orderBy("timestamp", "desc"));//日付順に表示
  const querySnapshot = await getDocs(q);

  querySnapshot.forEach((doc) => {
    const data = doc.data();
    const storyDiv = document.createElement("div");
    storyDiv.className = "story";
    storyDiv.innerHTML = `
      <h3>${data.title}</h3>
      <p><strong>${data.summary}</strong></p>
      <p>${data.story}</p>
      <small>${new Date(data.timestamp?.toDate?.() || Date.now()).toLocaleString()}</small>
    `;
    storyList.appendChild(storyDiv);
  });
}

loadStories();
