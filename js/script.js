const menuToggle = document.getElementById('menuToggle');
const navLinks = document.getElementById('navLinks');

menuToggle.addEventListener('click', () => {
  navLinks.classList.toggle('active');  // メニューの表示/非表示
  menuToggle.classList.toggle('close'); // ハンバーガーメニューの三本線→×へ
});
