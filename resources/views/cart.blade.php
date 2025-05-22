<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Keranjang Belanja - Fresh Market</title>
  <link rel="stylesheet" href="../css/styles.css" />
  <style>
    /* Global Styles */
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #f4f4f9;
    }

    h1 {
      color: #333;
    }

    /* Header Styles */
    header {
      background-color: #2e7d32;
      color: white;
      padding: 10px 20px;
      text-align: center;
    }

    header .logo {
      font-size: 1.5em;
      font-weight: bold;
    }

    header nav {
      margin-top: 10px;
    }

    header nav a {
      color: white;
      margin: 0 10px;
      text-decoration: none;
      font-weight: 500;
    }

    header nav a:hover {
      text-decoration: underline;
    }

    /* Cart Count in Navbar */
    .cart-count {
      background: #fff;
      color: #2e7d32;
      padding: 2px 6px;
      border-radius: 50%;
      font-size: 14px;
      position: absolute;
      top: -5px;
      right: -10px;
      min-width: 18px;
      text-align: center;
    }

    /* Main Content Styles */
    .cart-container {
      max-width: 1200px;
      margin: 20px auto;
      padding: 20px;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .cart-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px;
      border-bottom: 1px solid #eee;
      margin-bottom: 15px;
    }

    .cart-item-details {
      display: flex;
      gap: 20px;
      align-items: center;
    }

    .cart-item-image {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 8px;
    }

    .quantity-controls {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .quantity-btn {
      background: #2e7d32;
      color: white;
      border: none;
      width: 30px;
      height: 30px;
      border-radius: 50%;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .quantity {
      font-weight: bold;
      font-size: 1.2em;
    }

    .remove-btn {
      background: #dc3545;
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 5px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .remove-btn:hover {
      background: #c82333;
    }

    .cart-summary {
      margin-top: 30px;
      padding: 20px;
      background-color: #fafafa;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .subtotal,
    .shipping,
    .total {
      display: flex;
      justify-content: space-between;
      margin-bottom: 15px;
      font-size: 1.1em;
    }

    .primary-button {
      padding: 12px 20px;
      background: #2e7d32;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
      font-size: 1.1em;
      transition: background 0.3s ease;
    }

    .primary-button:hover {
      background: #388e3c;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
      .cart-item {
        flex-direction: column;
        align-items: flex-start;
      }

      .cart-item-details {
        flex-direction: column;
        gap: 10px;
      }

      .quantity-controls {
        flex-direction: column;
      }

      .cart-summary {
        margin-top: 20px;
      }
    }
  </style>
</head>
<body>
  <!-- Header -->
  <header>
    <div class="logo">Fresh Market</div>
    <nav>
      <a href="/">Beranda</a>
      <a href="/products">Produk</a>
      <a href="/cart">Keranjang</a>
      <a href="/checkout">Checkout</a>
    </nav>
  </header>

  <!-- Cart Container -->
  <div class="cart-container">
    <h1>Keranjang Belanja</h1>
    <div id="cart-items">
      <!-- Items akan ditampilkan melalui JavaScript -->
    </div>
    <div class="cart-summary">
      <div class="subtotal">
        <span>Subtotal:</span>
        <span id="cart-subtotal">Rp 0</span>
      </div>
      <div class="shipping">
        <span>Biaya Pengiriman:</span>
        <span id="shipping-cost">Rp 10.000</span>
      </div>
      <div class="total">
        <span>Total:</span>
        <span id="cart-total">Rp 0</span>
      </div>
      <button
        id="checkout-button"
        class="primary-button"
        onclick="window.location.href='/checkout'"
      >
        Lanjut ke Pembayaran
      </button>
    </div>
  </div>

  <!-- Cart Script -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const cartItems = JSON.parse(localStorage.getItem("cart")) || [];
      const cartItemsContainer = document.getElementById("cart-items");
      const subtotalElement = document.getElementById("cart-subtotal");
      const totalElement = document.getElementById("cart-total");

      function removeItem(productName) {
        const index = cartItems.findIndex(
          (item) => item.name === productName
        );
        if (index !== -1) {
          if (cartItems[index].quantity > 1) {
            cartItems[index].quantity -= 1;
          } else {
            cartItems.splice(index, 1);
          }
          localStorage.setItem("cart", JSON.stringify(cartItems));
          updateCart();
        }
      }

      function updateCart() {
        cartItemsContainer.innerHTML = "";
        let subtotal = 0;

        cartItems.forEach((item) => {
          subtotal += item.price * item.quantity;
          cartItemsContainer.innerHTML += `
            <div class="cart-item">
              <div class="cart-item-details">
                <img src="${item.image}" alt="${item.name}" class="cart-item-image" />
                <div>
                  <h3>${item.name}</h3>
                  <div class="quantity-controls">
                    <button onclick="decreaseQuantity('${
                      item.name
                    }')" class="quantity-btn">-</button>
                    <span class="quantity">${item.quantity}</span>
                    <button onclick="increaseQuantity('${
                      item.name
                    }')" class="quantity-btn">+</button>
                  </div>
                  <p>Rp ${item.price.toLocaleString()} x ${item.quantity}</p>
                  <p>Total: Rp ${(
                    item.price * item.quantity
                  ).toLocaleString()}</p>
                </div>
              </div>
              <button onclick="removeItem('${item.name}')" class="remove-btn">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </div>
          `;
        });

        subtotalElement.textContent = `Rp ${subtotal.toLocaleString()}`;
        totalElement.textContent = `Rp ${(
          subtotal + 10000
        ).toLocaleString()}`;

        // Update cart count di navbar
        const cartCountElements = document.querySelectorAll(".cart-count");
        const totalItems = cartItems.reduce(
          (sum, item) => sum + item.quantity,
          0
        );
        cartCountElements.forEach((element) => {
          element.textContent = totalItems;
        });
      }

      // Fungsi untuk menambah/kurangi quantity
      window.increaseQuantity = function (productName) {
        const item = cartItems.find((item) => item.name === productName);
        if (item) {
          item.quantity += 1;
          localStorage.setItem("cart", JSON.stringify(cartItems));
          updateCart();
        }
      };

      window.decreaseQuantity = function (productName) {
        const item = cartItems.find((item) => item.name === productName);
        if (item && item.quantity > 1) {
          item.quantity -= 1;
          localStorage.setItem("cart", JSON.stringify(cartItems));
          updateCart();
        } else if (item && item.quantity === 1) {
          removeItem(productName);
        }
      };

      // Membuat fungsi removeItem tersedia secara global
      window.removeItem = removeItem;

      // Inisialisasi tampilan keranjang
      updateCart();
    });
  </script>
</body>
</html>
