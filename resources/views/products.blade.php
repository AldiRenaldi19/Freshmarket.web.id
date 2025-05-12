<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Produk - Fresh Market</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <link rel="stylesheet" href="../css/styles.css" />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: "Poppins", sans-serif;
        background-color: #f8f9fa;
        color: #2c3e50;
      }

      /* Elegant Navbar */
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

      .logo {
        font-family: "Playfair Display", serif;
        font-size: 1.8rem;
        color: #2e7d32;
        text-decoration: none;
      }

      .nav-links {
        display: flex;
        gap: 2.5rem;
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

      /* Main Content */
      .main-container {
        margin-top: 100px;
        padding: 2rem 5%;
      }

      /* Elegant Header */
      .page-header {
        text-align: center;
        margin-bottom: 3rem;
      }

      .page-header h1 {
        font-family: "Playfair Display", serif;
        font-size: 2.5rem;
        color: #2c3e50;
        margin-bottom: 1rem;
      }

      .page-header p {
        color: #666;
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
      }

      /* Refined Filter Section */
      .filter-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2.5rem;
        flex-wrap: wrap;
        gap: 1rem;
      }

      .category-filter {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
      }

      .filter-btn {
        padding: 0.8rem 1.5rem;
        border: none;
        background: white;
        border-radius: 30px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.9rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      }

      .filter-btn.active {
        background: #2e7d32;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(46, 125, 50, 0.2);
      }

      /* Elegant Product Grid */
      .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 1.5rem;
        padding: 2rem 0;
      }

      .product-card {
        background: white;
        border-radius: 8px;
        padding: 0.8rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
      }

      .product-card img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 6px;
        margin-bottom: 0.8rem;
      }

      .product-name {
        font-size: 1rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.4rem;
      }

      .product-description {
        font-size: 0.85rem;
        color: #666;
        margin-bottom: 0.6rem;
      }

      .product-price {
        font-size: 0.95rem;
        font-weight: 600;
        color: #2e7d32;
        margin-bottom: 0.8rem;
      }

      .add-to-cart-btn {
        width: 100%;
        padding: 0.6rem;
        font-size: 0.9rem;
        background: #2e7d32;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background 0.3s;
      }

      .product-category {
        color: #2e7d32;
        font-size: 0.9rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
      }

      .product-stock {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 1.5rem;
      }

      .add-to-cart {
        width: 100%;
        padding: 1rem;
        background: #2e7d32;
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
      }

      .add-to-cart:hover {
        background: #1b5e20;
        transform: translateY(-2px);
      }

      /* Elegant Cart Icon */
      .cart-icon {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        background: #2e7d32;
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 5px 20px rgba(46, 125, 50, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .cart-icon:hover {
        transform: scale(1.1);
        background: #1b5e20;
      }

      .cart-count {
        position: absolute;
        top: -5px;
        right: -5px;
        background: #e74c3c;
        color: white;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        font-weight: 600;
        border: 2px solid white;
      }

      @media (max-width: 768px) {
        .nav-links {
          display: none;
        }

        .page-header h1 {
          font-size: 2rem;
        }

        .products-grid {
          grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        }

        .product-card img {
          height: 120px;
        }

        .product-name {
          font-size: 0.9rem;
        }

        .product-description {
          font-size: 0.8rem;
        }
      }

      .notification {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: #2e7d32;
        color: white;
        padding: 1rem;
        border-radius: 5px;
        display: none;
        animation: slideIn 0.3s ease;
      }

      @keyframes slideIn {
        from {
          transform: translateX(100%);
        }
        to {
          transform: translateX(0);
        }
      }

      .cart-count {
        background: #e53935;
        color: white;
        padding: 2px 6px;
        border-radius: 50%;
        font-size: 0.8rem;
        position: relative;
        top: -8px;
      }
    </style>
  </head>
  <body>
    <nav class="navbar">
      <div class="logo-container">
        <img
          src="../assets/images/logo.png"
          alt="Fresh Market Logo"
          style="width: 40px; height: 40px; object-fit: contain"
        />
        <div class="logo">Fresh Market</div>
      </div>

      <div class="nav-links">
        <a href="/" class="nav-link">Beranda</a>
        <a href="/products" class="nav-link">Produk</a>
        <a href="/about" class="nav-link">Tentang Kami</a>
        <a href="/contact" class="nav-link">Kontak</a>
        <a href="/cart" class="cart-link">
          <i class="fas fa-shopping-cart"></i>
          Keranjang <span class="cart-count">0</span>
        </a>
        <a href="/login" class="auth-btn">Masuk</a>
      </div>
    </nav>

    <div class="main-container">
      <div class="page-header">
        <h1>Koleksi Sayuran Segar</h1>
        <p>
          Pilih dari berbagai sayuran organik berkualitas tinggi, dipetik
          langsung dari kebun kami
        </p>
      </div>

      <div class="filter-section">
        <div class="category-filter">
          <button class="filter-btn active">Semua</button>
          <button class="filter-btn">Sayuran Daun</button>
          <button class="filter-btn">Sayuran Buah</button>
          <button class="filter-btn">Sayuran Umbi</button>
          <button class="filter-btn">Bumbu Dapur</button>
        </div>
      </div>

      <div class="products-grid">
        <!-- Sayuran Daun -->
        <div class="product-card" data-category="Sayuran Daun">
          <img
            src="https://images.unsplash.com/photo-1576045057995-568f588f82fb"
            alt="Bayam"
          />
          <h3 class="product-name">Bayam</h3>
          <p class="product-description">Bayam segar kaya nutrisi</p>
          <p class="product-price">Rp 5.000/ikat</p>
          <button class="add-to-cart-btn">Tambah ke Keranjang</button>
        </div>

        <div class="product-card" data-category="Sayuran Daun">
          <img
            src="https://images.unsplash.com/photo-1592424002053-21f369ad7fdb"
            alt="Kangkung"
          />
          <h3 class="product-name">Kangkung</h3>
          <p class="product-description">Kangkung segar</p>
          <p class="product-price">Rp 4.000/ikat</p>
          <button class="add-to-cart-btn">Tambah ke Keranjang</button>
        </div>

        <div class="product-card" data-category="Sayuran Daun">
          <img
            src="https://images.unsplash.com/photo-1574316071802-0d684efa7bf5"
            alt="Sawi Hijau"
          />
          <h3 class="product-name">Sawi Hijau</h3>
          <p class="product-description">Sawi hijau segar</p>
          <p class="product-price">Rp 6.000/ikat</p>
          <button class="add-to-cart-btn">Tambah ke Keranjang</button>
        </div>

        <!-- Sayuran Buah -->
        <div class="product-card" data-category="Sayuran Buah">
          <img
            src="https://images.unsplash.com/photo-1592924357228-91a4daadcfea"
            alt="Tomat"
          />
          <h3 class="product-name">Tomat Segar</h3>
          <p class="product-description">Tomat merah manis</p>
          <p class="product-price">Rp 12.000/kg</p>
          <button class="add-to-cart-btn">Tambah ke Keranjang</button>
        </div>

        <div class="product-card" data-category="Sayuran Buah">
          <img
            src="https://images.unsplash.com/photo-1635364373425-755835e10d7d"
            alt="Terong Ungu"
          />
          <h3 class="product-name">Terong Ungu</h3>
          <p class="product-description">Terong ungu segar</p>
          <p class="product-price">Rp 8.000/kg</p>
          <button class="add-to-cart-btn">Tambah ke Keranjang</button>
        </div>

        <!-- Sayuran Umbi -->
        <div class="product-card" data-category="Sayuran Umbi">
          <img
            src="https://images.unsplash.com/photo-1582515073490-39981397c445"
            alt="Wortel"
          />
          <h3 class="product-name">Wortel</h3>
          <p class="product-description">Wortel segar kaya vitamin A</p>
          <p class="product-price">Rp 15.000/kg</p>
          <button class="add-to-cart-btn">Tambah ke Keranjang</button>
        </div>

        <div class="product-card" data-category="Sayuran Umbi">
          <img
            src="https://images.unsplash.com/photo-1518977676601-b53f82aba655"
            alt="Kentang"
          />
          <h3 class="product-name">Kentang</h3>
          <p class="product-description">Kentang kuning premium</p>
          <p class="product-price">Rp 18.000/kg</p>
          <button class="add-to-cart-btn">Tambah ke Keranjang</button>
        </div>

        <!-- Bumbu Dapur -->
        <div class="product-card" data-category="Bumbu Dapur">
          <img
            src="https://images.unsplash.com/photo-1615477550927-6e7ada23e338"
            alt="Bawang Merah"
          />
          <h3 class="product-name">Bawang Merah</h3>
          <p class="product-description">Bawang merah Brebes</p>
          <p class="product-price">Rp 35.000/kg</p>
          <button class="add-to-cart-btn">Tambah ke Keranjang</button>
        </div>

        <div class="product-card" data-category="Bumbu Dapur">
          <img
            src="https://images.unsplash.com/photo-1615478503562-ec2d8aa0e24e"
            alt="Bawang Putih"
          />
          <h3 class="product-name">Bawang Putih</h3>
          <p class="product-description">Bawang putih kating</p>
          <p class="product-price">Rp 30.000/kg</p>
          <button class="add-to-cart-btn">Tambah ke Keranjang</button>
        </div>

        <div class="product-card" data-category="Bumbu Dapur">
          <img
            src="https://images.unsplash.com/photo-1615478503562-ec2d8aa0e24e"
            alt="Jahe"
          />
          <h3 class="product-name">Jahe Merah</h3>
          <p class="product-description">Jahe merah premium</p>
          <p class="product-price">Rp 25.000/kg</p>
          <button class="add-to-cart-btn">Tambah ke Keranjang</button>
        </div>
      </div>

      <div class="product-reviews">
        <div class="review-form">
          <h3>Berikan Review</h3>
          <div class="rating-stars">
            <input type="radio" name="rating" value="5" id="star5" />
            <label for="star5">★</label>
            <!-- Ulangi untuk bintang 4-1 -->
          </div>
          <textarea placeholder="Tulis review Anda di sini..."></textarea>
          <button class="submit-review">Kirim Review</button>
        </div>
        <div class="review-list">
          <!-- Review akan ditampilkan di sini -->
        </div>
      </div>
    </div>

    <div class="cart-icon">
      <i class="fas fa-shopping-cart"></i>
      <span class="cart-count">0</span>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Implementasi Shopping Cart
        class ShoppingCart {
          constructor() {
            this.items = JSON.parse(localStorage.getItem("cart")) || [];
            this.total = 0;
            this.updateCartCount();
          }

          addItem(product) {
            const existingItem = this.items.find(
              (item) => item.name === product.name
            );

            if (existingItem) {
              existingItem.quantity += 1;
            } else {
              this.items.push({
                name: product.name,
                price: product.price,
                quantity: 1,
              });
            }

            this.saveToLocalStorage();
            this.updateCartCount();
            return true;
          }

          updateCartCount() {
            const cartCountElements = document.querySelectorAll(".cart-count");
            const totalItems = this.items.reduce(
              (sum, item) => sum + item.quantity,
              0
            );
            cartCountElements.forEach((element) => {
              element.textContent = totalItems;
            });
          }

          saveToLocalStorage() {
            localStorage.setItem("cart", JSON.stringify(this.items));
          }
        }

        // Inisialisasi keranjang
        const cart = new ShoppingCart();

        // Menangani tombol "Tambah ke Keranjang"
        const addToCartButtons = document.querySelectorAll(".add-to-cart-btn");

        addToCartButtons.forEach((button) => {
          button.addEventListener("click", function () {
            const productCard = this.closest(".product-card");
            const productName =
              productCard.querySelector(".product-name").textContent;
            const productPrice =
              productCard.querySelector(".product-price").textContent;
            const price = parseInt(productPrice.replace(/\D/g, "")); // Mengambil angka saja dari harga

            const product = {
              name: productName,
              price: price,
            };

            if (cart.addItem(product)) {
              // Tampilkan notifikasi sukses
              alert(`${productName} berhasil ditambahkan ke keranjang!`);
            }
          });
        });

        // Filter produk
        const filterButtons = document.querySelectorAll(".filter-btn");

        filterButtons.forEach((button) => {
          button.addEventListener("click", function () {
            filterButtons.forEach((btn) => btn.classList.remove("active"));
            this.classList.add("active");

            const category = this.textContent;
            const products = document.querySelectorAll(".product-card");

            products.forEach((product) => {
              if (
                category === "Semua" ||
                product.dataset.category === category
              ) {
                product.style.display = "block";
              } else {
                product.style.display = "none";
              }
            });
          });
        });
      });
    </script>
  </body>
</html>
