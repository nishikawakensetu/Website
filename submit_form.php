<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // CSRFトークンの検証
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        header("Location: error.html");
        exit;
    }

    // フォームからのデータを取得
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $message = htmlspecialchars($_POST['message']);

    // メールの設定
    $to = "nisikawa3580@blue.ocn.ne.jp";
    $subject = "お問い合わせ内容: $name 様";
    $body = "以下の内容でお問い合わせがありました。\n\n" .
            "お名前: $name\n" .
            "メールアドレス: $email\n" .
            "電話番号: $phone\n" .
            "お問い合わせ内容:\n$message";

    $headers = "From: no-reply@nishikawakensetu.co.jp";

    // メール送信
    if (mail($to, $subject, $body, $headers)) {
        header("Location: thank_you.html");
        exit;
    } else {
        error_log("メール送信に失敗しました: " . error_get_last()['message']);
        header("Location: error.html");
        exit;
    }
}
?>
