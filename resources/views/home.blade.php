<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fresh Market - Sayuran Segar Langsung dari Petani</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <style>
    * {
      margin: 0; padding: 0; box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      line-height: 1.6;
    }

    .navbar {
      display: flex; justify-content: space-between; align-items: center;
      padding: 1rem 5%; background: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      position: fixed; top: 0; width: 100%; z-index: 1000;
    }

    .logo-container {
      display: flex; align-items: center; gap: 10px;
    }

    .logo {
      font-weight: 700; font-size: 1.3rem; color: #2e7d32;
    }

    .search-container,
    .nav-links,
    .auth-buttons {
      display: none;
    }

    .hamburger {
      display: flex; flex-direction: column; gap: 5px;
      cursor: pointer;
    }

    .hamburger span {
      width: 25px; height: 3px; background: #2e7d32;
    }

    .nav-mobile {
      position: fixed;
      top: 65px;
      left: 0;
      width: 100%;
      background: #fff;
      flex-direction: column;
      display: none;
      padding: 1rem;
      gap: 1rem;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      z-index: 999;
    }

    .nav-mobile a {
      padding: 10px;
      text-align: center;
      text-decoration: none;
      background: #f4f4f4;
      border-radius: 5px;
      color: #333;
      display: block;
    }

    .nav-mobile a:hover {
      background: #2e7d32;
      color: #fff;
    }

    .hero {
      margin-top: 65px;
      height: 90vh;
      background: linear-gradient(rgba(0,0,0,0.4), rgba(46,125,50,0.6)),
        url('https://images.unsplash.com/photo-1597362925123-77861d3fbac7?auto=format&fit=crop&q=80');
      background-size: cover;
      background-position: center;
      display: flex;
      align-items: center;
      padding: 0 5%;
      color: white;
    }

    .hero-content {
      max-width: 100%;
    }

    .hero-content h1 {
      font-size: 2rem;
      margin-bottom: 1rem;
    }

    .hero-content p {
      font-size: 1rem;
      margin-bottom: 1.5rem;
    }

    .cta-btn {
      display: inline-block;
      margin-right: 1rem;
      background: #2e7d32;
      color: #fff;
      padding: 0.75rem 1.5rem;
      border-radius: 30px;
      text-decoration: none;
      font-weight: 600;
    }

    .cta-btn:hover {
      background: #1b5e20;
    }

    .features {
      padding: 2rem 5%;
      background: #f9f9f9;
    }

    .section-title {
      text-align: center;
      margin-bottom: 2rem;
    }

    .section-title h2 {
      color: #2e7d32;
      font-size: 1.8rem;
    }

    .features-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }

    .feature-card {
      background: #fff;
      padding: 1.5rem;
      text-align: center;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .feature-card img {
      width: 60px; height: 60px; margin-bottom: 1rem;
    }

    .feature-card h3 {
      color: #2e7d32;
      margin-bottom: 0.5rem;
    }

    .cart-link {
      display: flex;
      justify-content: center;
      align-items: center;
      text-decoration: none;
      color: #333;
    }

    .cart-link .fa-shopping-cart {
      margin-right: 5px;
    }

    .cart-count {
      background: #2e7d32;
      color: #fff;
      padding: 2px 6px;
      border-radius: 10px;
      font-size: 12px;
      margin-left: 5px;
    }

    @media (min-width: 768px) {
      .hamburger { display: none; }
      .search-container,
      .nav-links,
      .auth-buttons {
        display: flex;
        gap: 1.5rem;
        align-items: center;
      }

      .nav-links a,
      .auth-buttons a {
        text-decoration: none;
        color: #333;
        font-weight: 500;
      }

      .nav-links a:hover,
      .auth-buttons a:hover {
        color: #2e7d32;
      }

      .features-grid {
        grid-template-columns: repeat(3, 1fr);
      }
    }
  </style>
</head>
<body>
  <nav class="navbar">
    <div class="logo-container">
      <img src="assets/images/logo.png" alt="Fresh Market Logo" style="width: 40px; height: 40px;" />
      <div class="logo">Fresh Market</div>
    </div>

    <div class="search-container">
      <input type="text" placeholder="Cari sayuran..." style="padding: 5px; border-radius: 5px;" />
      <button style="padding: 5px 10px; background: #2e7d32; color: #fff; border: none; border-radius: 5px;">
        <i class="fas fa-search"></i>
      </button>
    </div>

    <div class="nav-links">
      <a href="/">Beranda</a>
      <a href="/products">Produk</a>
      <a href="/about">Tentang Kami</a>
      <a href="/contact">Kontak</a>
      <a href="/cart" class="cart-link">
        <i class="fas fa-shopping-cart"></i>
        Keranjang <span class="cart-count">0</span>
      </a>
    </div>

    <div class="auth-buttons">
      <a href="/login">Masuk</a>
      <a href="/register" style="background: #2e7d32; color: #fff; padding: 5px 10px; border-radius: 5px;">Daftar</a>
    </div>

    <div class="hamburger" onclick="toggleMobileMenu()">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </nav>

  <div class="nav-mobile" id="mobileMenu">
    <a href="/">Beranda</a>
    <a href="/products">Produk</a>
    <a href="/about">Tentang</a>
    <a href="/contact">Kontak</a>
    <a href="/cart" class="cart-link">
      <i class="fas fa-shopping-cart"></i>
      Keranjang <span class="cart-count">0</span>
    </a>
    <a href="/login">Masuk</a>
    <a href="/register">Daftar</a>
  </div>

  <section class="hero">
    <div class="hero-content">
      <h1>Sayuran Segar Langsung dari Petani ke Meja Anda</h1>
      <p>Nikmati sayuran organik berkualitas tinggi yang dipetik langsung dari kebun kami.</p>
      <a href="/products" class="cta-btn">Belanja Sekarang</a>
      <a href="/products" class="cta-btn" style="background:#fff; color:#2e7d32;">Lihat Produk</a>
    </div>
  </section>

  <section class="features">
    <div class="section-title">
      <h2>Mengapa Memilih Kami?</h2>
    </div>
    <div class="features-grid">
      <div class="feature-card">
        <img src="https://img.icons8.com/fluency/48/organic-food.png" alt="Organik" />
        <h3>100% Organik</h3>
        <p>Produk kami bebas pestisida dan ramah lingkungan.</p>
      </div>
      <div class="feature-card">
        <img src="https://img.icons8.com/color/96/000000/guarantee.png" alt="Petani" />
        <h3>Dari Petani Lokal</h3>
        <p>Langsung dari petani untuk menjaga kesegaran dan mendukung ekonomi lokal.</p>
      </div>
      <div class="feature-card">
        <img src="https://img.icons8.com/fluency/48/delivery.png" alt="Cepat" />
        <h3>Pengiriman Cepat</h3>
        <p>Pesanan diantar cepat dan aman hingga ke rumah Anda.</p>
      </div>
    </div>
  </section>


  <script>
    function toggleMobileMenu() {
      const menu = document.getElementById("mobileMenu");
      menu.style.display = (menu.style.display === "flex") ? "none" : "flex";
    }

    document.addEventListener("DOMContentLoaded", function () {
        const user = JSON.parse(localStorage.getItem("user"));
    const authButtons = document.querySelector(".auth-buttons");
    const mobileMenu = document.getElementById("mobileMenu");

    if (user) {
  // Desktop navbar
  if (authButtons) {
    authButtons.innerHTML = `
      <a href="pages/admin/dasboard" style="font-weight:600; color:#2e7d32;" >Halo, ${user.name} </a>
      <a href="/" onclick="logout()" style="margin-left: 10px; color: red;">Keluar</a>
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
      <span style="text-align:center; font-weight:600; color:#2e7d32;">Halo, ${user.name} </span>
      <a href="/" onclick="logout()" style="color:red;">Keluar</a>
    `;
  }
}

      class ShoppingCart {
        constructor() {
          this.items = JSON.parse(localStorage.getItem("cart")) || [];
          this.updateCartCount();
        }

        updateCartCount() {
          const cartCountElements = document.querySelectorAll(".cart-count");
          const totalItems = this.items.reduce((sum, item) => sum + item.quantity, 0);
          cartCountElements.forEach((element) => {
            element.textContent = totalItems;
          });
        }

        addItem(product) {
          const existingItem = this.items.find(item => item.name === product.name);
          if (existingItem) {
            existingItem.quantity += 1;
          } else {
            this.items.push({ ...product, quantity: 1 });
          }
          this.saveToLocalStorage();
          this.updateCartCount();
        }

        saveToLocalStorage() {
          localStorage.setItem("cart", JSON.stringify(this.items));
        }
      }

      new ShoppingCart(); // Inisialisasi saat halaman dimuat
    });
    
    
  function logout() {
    localStorage.removeItem("user");
    window.location.reload();
  }
  </script>
</body>
</html>
