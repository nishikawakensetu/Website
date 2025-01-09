<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 入力値の取得とサニタイズ
    $name = htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $phone = htmlspecialchars($_POST["phone"], ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($_POST["message"], ENT_QUOTES, 'UTF-8');

    // メール送信設定
    $to = "nisikawa3580@blue.ocn.ne.jp"; // 管理者のメールアドレス
    $subject = "お問い合わせがありました";
    $body = "以下の内容でお問い合わせがありました:\n\n" .
            "お名前: $name\n" .
            "メールアドレス: $email\n" .
            "電話番号: $phone\n" .
            "お問い合わせ内容:\n$message\n";

    $headers = "From: $email\r\n";

    // メール送信処理
    if (mail($to, $subject, $body, $headers)) {
        // 成功時: thank_you.html にリダイレクト
        header("Location: thank_you.html");
        exit();
    } else {
        // 失敗時: error.html にリダイレクト
        header("Location: error.html");
        exit();
    }
} else {
    // 不正なリクエストへの対応: error.html にリダイレクト
    header("Location: error.html");
    exit();
}
?>
