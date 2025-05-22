<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tentang Kami - Fresh Market</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: url('https://images.unsplash.com/photo-1597362925123-77861d3fbac7?auto=format&fit=crop&w=1920&q=80') no-repeat center center fixed;
      background-size: cover;
      color: #333;
    }

    .navbar {
      background: rgba(255, 255, 255, 0.95);
      padding: 1.2rem 5%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      backdrop-filter: blur(10px);
    }

    .logo-container {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logo {
      font-family: "Playfair Display", serif;
      font-size: 1.8rem;
      color: #2e7d32;
      text-decoration: none;
    }

    .nav-links {
      display: flex;
      gap: 2rem;
      align-items: center;
    }

    .nav-links a {
      text-decoration: none;
      color: #2c3e50;
      font-weight: 500;
      font-size: 0.95rem;
      position: relative;
      padding-bottom: 5px;
    }

    .nav-links a::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 2px;
      background: #2e7d32;
      transition: width 0.3s ease;
    }

    .nav-links a:hover::after {
      width: 100%;
    }

    .cart-link i {
      margin-right: 5px;
    }

    .cart-count {
      background: #fff;
      color: #2e7d32;
      padding: 2px 6px;
      border-radius: 10px;
      font-size: 12px;
      margin-left: 5px;
    }

    .hamburger-menu {
      display: none;
      cursor: pointer;
      flex-direction: column;
      gap: 4px;
    }

    .hamburger-menu div {
      width: 25px;
      height: 3px;
      background-color: #333;
    }

    .about-container {
      max-width: 900px;
      margin: 130px auto 40px;
      padding: 30px;
      background: rgba(255, 255, 255, 0.92);
      border-radius: 12px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    }

    .about-container h1 {
      text-align: center;
      font-size: 32px;
      color: #2e7d32;
      margin-bottom: 20px;
    }

    .about-content,
    .our-mission,
    .our-team {
      margin-top: 30px;
    }

    .about-content p,
    .our-mission p {
      font-size: 16px;
      line-height: 1.6;
    }

    .our-team h2 {
      margin-bottom: 20px;
    }

    .team-member {
      text-align: center;
      margin-top: 10px;
    }

    .team-member img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 10px;
      border: 3px solid #2e7d32;
    }

    .team-member h3 {
      margin: 0;
      font-size: 18px;
      color: #2e7d32;
    }

    .team-member p {
      font-size: 14px;
      color: #666;
    }

    @media (max-width: 768px) {
      .nav-links {
        display: none;
        flex-direction: column;
        gap: 1rem;
        align-items: center;
        background: rgba(255, 255, 255, 0.95);
        position: absolute;
        top: 70px;
        right: 20px;
        width: 250px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      }

      .nav-links.active {
        display: flex;
      }

      .hamburger-menu {
        display: flex;
      }

      .nav-links a {
        font-size: 1rem;
      }

      .about-container {
        margin: 100px 20px 20px;
        padding: 20px;
      }

      .team-member img {
        width: 100px;
        height: 100px;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar">
    <div class="logo-container">
      <img src="/assets/images/logo.png" alt="Fresh Market Logo" style="width: 40px; height: 40px; object-fit: contain" />
      <div class="logo">Fresh Market</div>
    </div>

    <div class="hamburger-menu" id="hamburger-menu">
      <div></div>
      <div></div>
      <div></div>
    </div>

    <div class="nav-links" id="nav-links">
      <a href="/" class="nav-link">Beranda</a>
      <a href="/products" class="nav-link">Produk</a>
      <a href="/about" class="nav-link">Tentang Kami</a>
      <a href="/contact" class="nav-link">Kontak</a>
      <a href="/cart" class="cart-link">
        <i class="fas fa-shopping-cart"></i>
        Keranjang <span class="cart-count" id="cart-count">0</span>
      </a>
      <a href="/login" class="auth-btn">Masuk</a>
    </div>
  </nav>

  <div class="about-container">
    <h1>Tentang Fresh Market</h1>

    <div class="about-content">
      <p>
        Fresh Market adalah platform yang menghubungkan petani lokal dengan konsumen yang mencari sayuran segar berkualitas. Kami percaya bahwa makanan sehat harus mudah diakses oleh semua orang, dan petani harus mendapatkan nilai yang adil atas hasil panen mereka.
      </p>
    </div>

    <div class="our-mission">
      <h2>Misi Kami</h2>
      <p>
        Menyediakan sayuran organik berkualitas tinggi dengan harga terjangkau dan mendukung pertanian lokal serta keberlanjutan lingkungan.
      </p>
    </div>

    <div class="our-team">
      <h2>Tim Kami</h2>
      <div class="team-member">
        <img src="/assets/images/team-member1.jpg" alt="Anggota Tim 1" />
        <h3>Nama Anggota 1</h3>
        <p>Founder & CEO</p>
      </div>
    </div>
  </div>

  <script>
  function logout() {
    localStorage.removeItem("user");
    window.location.reload(); // atau arahkan ke halaman login
  }

  document.addEventListener("DOMContentLoaded", function () {
    const user = JSON.parse(localStorage.getItem("user"));
    const authButtons = document.querySelector(".auth-btn");
    const mobileMenu = document.getElementById("mobileMenu");

    if (user) {
      // Desktop navbar
      if (authButtons) {
        authButtons.innerHTML = `
          <span style="font-weight:600; color:#2e7d32;">Halo, ${user.name}</span>
          <a href="#" onclick="logout()" style="margin-left: 10px; color: red;">Keluar</a>
        `;
      }

      // Mobile menu lengkap
      if (mobileMenu) {
        mobileMenu.innerHTML = `
          <a href="/">Beranda</a>
          <a href="/products">Produk</a>
          <a href="/about">Tentang Kami</a>
          <a href="/contact">Kontak</a>
          <a href="/cart" class="cart-link">
            <i class="fas fa-shopping-cart"></i> Keranjang <span class="cart-count">0</span>
          </a>
          <span style="text-align:center; font-weight:600; color:#2e7d32;">Halo, ${user.name}</span>
          <a href="/pages/admin" onclick="logout()" style="color:red;">Keluar</a>
        `;
      }
    }

    const hamburgerMenu = document.getElementById("hamburger-menu");
    const navLinks = document.getElementById("nav-links");

    hamburgerMenu.addEventListener("click", () => {
      navLinks.classList.toggle("active");
    });

    function updateCartCount() {
      const cart = JSON.parse(localStorage.getItem("cart")) || [];
      const count = cart.reduce((total, item) => total + (item.quantity || 1), 0);
      document.querySelectorAll(".cart-count").forEach(el => {
        el.textContent = count;
      });
    }

    updateCartCount();
  });
</script>

</body>
</html>
