<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームからのデータを取得
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // メールの設定
    $to = "nisikawa3580@blue.ocn.ne.jp";  // 送信先のメールアドレス
    $subject = "お問い合わせ内容: $name 様";
    $body = "以下の内容でお問い合わせがありました。\n\n".
            "お名前: $name\n".
            "メールアドレス: $email\n".
            "電話番号: $phone\n".
            "お問い合わせ内容:\n$message";

    $headers = "From: $email";

    // メール送信
    if (mail($to, $subject, $body, $headers)) {
        // 送信成功時、thank_you.html にリダイレクト
        header("Location: thank_you.html");
        exit;
    } else {
        // 送信失敗時、error.html にリダイレクト
        header("Location: error.html");
        exit;
    }
}
?>
