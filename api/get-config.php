<?php
// セキュアな設定ファイルを読み込む
$firebaseConfig = include(__DIR__ . '/../config/firebase-config.php');

$publicConfig = [
  'apiKey' => $firebaseConfig['apiKey'],
  'authDomain' => $firebaseConfig['authDomain'],
  'projectId' => $firebaseConfig['projectId'],
  'storageBucket' => $firebaseConfig['storageBucket'],
  'messagingSenderId' => $firebaseConfig['messagingSenderId'],
  'appId' => $firebaseConfig['appId']
];

// JSONとして返す
header('Content-Type: application/json');
echo json_encode($publicConfig);
