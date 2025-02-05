const urlParams = new URLSearchParams(window.location.search);
document.getElementById("confirm-name").textContent = urlParams.get("name");
document.getElementById("confirm-email").textContent = urlParams.get("email");
document.getElementById("confirm-phone").textContent = urlParams.get("phone");
document.getElementById("confirm-message").textContent = urlParams.get("message");

document.getElementById("hidden-name").value = urlParams.get("name");
document.getElementById("hidden-email").value = urlParams.get("email");
document.getElementById("hidden-phone").value = urlParams.get("phone");
document.getElementById("hidden-message").value = urlParams.get("message");

document.getElementById("submitForm").addEventListener("submit", function(event) {
  event.preventDefault();

  const params = new URLSearchParams();
  params.append("name", document.getElementById("hidden-name").value);
  params.append("email", document.getElementById("hidden-email").value);
  params.append("phone", document.getElementById("hidden-phone").value);
  params.append("message", document.getElementById("hidden-message").value);

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "https://formspree.io/f/your-form-id", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        window.location.href = "thank_you.html";
      } else {
        window.location.href = "error.html";
      }
    }
  };
  xhr.send(params.toString());
});
