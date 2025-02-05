document.getElementById("contactForm").addEventListener("submit", function(event) {
  event.preventDefault();

  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const phone = document.getElementById("phone").value.trim();
  const message = document.getElementById("message").value.trim();

  const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  const phonePattern = /^0\d{1,4}-\d{1,4}-\d{4}$/;

  if (!emailPattern.test(email)) {
    alert("メールアドレスが正しくありません。");
    return;
  }

  if (!phonePattern.test(phone)) {
    alert("電話番号が正しくありません。");
    return;
  }

  // 確認画面にデータを渡す
  const params = new URLSearchParams();
  params.append("name", name);
  params.append("email", email);
  params.append("phone", phone);
  params.append("message", message);

  window.location.href = `confirm.html?${params.toString()}`;
});
