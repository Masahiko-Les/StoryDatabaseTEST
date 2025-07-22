<!DOCTYPE html>
<html lang="ja">
<head>

  <!-- 共通した<head>部分を読み込む -->
  <?php include("common/haed.php"); ?>
  <!-- このページ用のCSS -->
  <link rel="stylesheet" href="css/passion.css">

</head>
<body>

<!-- ヘッダーを読み込む -->
  <?php include("common/header.php"); ?>

<main class="passion-main">
  <section class="hero-section">
    <h1>わたしの想い（仮）</h1>
    <p>このプロジェクトに込めた気持ちや、届けたいメッセージについて。</p>
  </section>

  <section class="about-section">
    <h2>このサイトを作った理由</h2>
    <p>
      私はこれまでの人生の中で、たくさんの苦しみや孤独を経験してきました。<br>
      でもそれを言葉にして共有することで、「自分だけじゃない」と思えるようになったんです。<br>
      このサイトは、そんな「回復と共感のきっかけ」を届けるために生まれました。
    </p>
  </section>

  <section class="gallery-section">
    <h2>言葉で彩る人生</h2>
    <div class="image-grid">
      <img src="assets/images/hope.jpg" alt="希望">
      <img src="assets/images/share.jpg" alt="共有">
      <img src="assets/images/light.jpg" alt="光">
    </div>
  </section>

  <section class="value-section">
    <h2>大切にしていること</h2>

    <div class="value-box">
      <div class="value-number">01</div>
      <div class="value-text">
        <h3>誰かの心に寄り添うこと</h3>
        <p>あなたの言葉が、誰かの救いになる。その力を信じています。</p>
      </div>
    </div>

    <div class="value-box">
      <div class="value-number">02</div>
      <div class="value-text">
        <h3>安心して投稿できる場を</h3>
        <p>投稿者が安心して心のうちを語れる環境を目指しています。</p>
      </div>
    </div>

    <div class="value-box">
      <div class="value-number">03</div>
      <div class="value-text">
        <h3>支え合いの輪を広げる</h3>
        <p>経験や想いが、優しいつながりを生み出すように。</p>
      </div>
    </div>
  </section>
</main>

<?php include("common/footer.php"); ?>
