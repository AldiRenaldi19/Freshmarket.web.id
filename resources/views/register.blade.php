<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar - Fresh Market</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <style>
      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
      }
      
      body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-image: url('https://images.unsplash.com/photo-1597362925123-77861d3fbac7?auto=format');
  background-size: cover; /* Agar gambar menutupi seluruh layar */
  background-position: center center; /* Memastikan gambar di tengah */
  background-repeat: no-repeat; /* Menghindari pengulangan gambar */
}


      .container {
        display: flex;
        width: 90%;
        max-width: 1000px;
        background-color: white;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        overflow: hidden;
      }

      .left-side,
      .right-side {
        flex: 1;
        padding: 40px;
      }

      .left-side {
        background: #2e7d32;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
      }

      .left-side h1 {
        font-size: 36px;
        margin-bottom: 10px;
      }

      .left-side h2 {
        font-size: 24px;
        margin-bottom: 10px;
      }

      .left-side p {
        font-size: 16px;
      }

      .right-side h1 {
        margin-bottom: 20px;
        text-align: center;
      }

      .form-group {
        margin-bottom: 20px;
        position: relative;
      }

      .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
      }

      .error-message {
        color: #dc3545;
        font-size: 12px;
        margin-top: 5px;
        display: block;
      }

      .password-input {
        position: relative;
      }

      .toggle-password {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #666;
      }

      .register-button {
        width: 100%;
        padding: 12px;
        background: #2e7d32;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .register-button:hover {
        background: #1b5e20;
      }

      .register-button:disabled {
        background: #ccc;
        cursor: not-allowed;
      }

      .loading-spinner {
        display: none;
        width: 20px;
        height: 20px;
        border: 2px solid #fff;
        border-top: 2px solid transparent;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        position: absolute;
        right: 10px;
      }

      @keyframes spin {
        0% {
          transform: rotate(0deg);
        }
        100% {
          transform: rotate(360deg);
        }
      }

      .register-button.loading .button-text {
        visibility: hidden;
      }

      .register-button.loading .loading-spinner {
        display: block;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="left-side">
        <h1>Fresh Market</h1>
        <h2>Bergabunglah dengan Kami</h2>
        <p>Nikmati kemudahan berbelanja sayuran segar langsung dari petani</p>
      </div>
      <div class="right-side">
        <form id="registerForm">
          <h1>Daftar Akun Baru</h1>

          <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" required minlength="3" />
            <small class="error-message"></small>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" required />
            <small class="error-message"></small>
          </div>

          <div class="form-group">
            <label for="phone">Nomor Telepon</label>
            <input type="tel" id="phone" required pattern="[0-9]{10,13}" />
            <small class="error-message"></small>
          </div>

          <div class="form-group">
            <label for="password">Kata Sandi</label>
            <div class="password-input">
              <input type="password" id="password" required minlength="8" />
              <i class="fas fa-eye-slash toggle-password"></i>
            </div>
            <small class="error-message"></small>
          </div>

          <div class="form-group">
            <label for="confirm-password">Konfirmasi Kata Sandi</label>
            <div class="password-input">
              <input type="password" id="confirm-password" required />
              <i class="fas fa-eye-slash toggle-password"></i>
            </div>
            <small class="error-message"></small>
          </div>

          <button type="submit" class="register-button">
            <span class="button-text">Daftar</span>
            <span class="loading-spinner"></span>
          </button>

          <div class="options">
            <p>Sudah punya akun? <a href="/login">Masuk di sini</a></p>
          </div>
        </form>
      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("registerForm");
        const passwordToggles = document.querySelectorAll(".toggle-password");
        const registerButton = document.querySelector(".register-button");

        // Toggle password visibility
        passwordToggles.forEach((toggle) => {
          toggle.addEventListener("click", function () {
            const input = this.previousElementSibling;
            const type =
              input.getAttribute("type") === "password" ? "text" : "password";
            input.setAttribute("type", type);
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
          });
        });

        // Validasi form
        function validateForm() {
          let isValid = true;
          const name = document.getElementById("name");
          const email = document.getElementById("email");
          const phone = document.getElementById("phone");
          const password = document.getElementById("password");
          const confirmPassword = document.getElementById("confirm-password");
          const errorMessages = document.querySelectorAll(".error-message");

          // Reset error messages
          document
            .querySelectorAll(".error-message")
            .forEach((error) => (error.textContent = ""));

          // Validasi nama
          if (name.value.length < 3) {
            showError("Nama harus minimal 3 karakter");
            isValid = false;
          }

          // Validasi email
          if (!email.value.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
            showError("Format email tidak valid");
            isValid = false;
          }

          // Validasi nomor telepon
          if (!phone.value.match(/^[0-9]{10,13}$/)) {
            showError("Nomor telepon harus 10-13 digit");
            isValid = false;
          }

          // Validasi password
          if (password.value.length < 8) {
            showError("Password minimal 8 karakter");
            isValid = false;
          }

          // Validasi konfirmasi password
          if (password.value !== confirmPassword.value) {
            showError("Password tidak cocok");
            isValid = false;
          }

          return isValid;
        }

        // Submit form dan validasi
        form.addEventListener("submit", async function (e) {
          e.preventDefault();
          
          if (!validateForm()) return;
          
          registerButton.classList.add("loading");
          
          const formData = {
            name: document.getElementById("name").value,
            email: document.getElementById("email").value,
            phone: document.getElementById("phone").value,
            password: document.getElementById("password").value,
          };
          
          // Ambil data users yang sudah ada
          const registeredUsers = JSON.parse(localStorage.getItem("registeredUsers")) || [];
          
          // Cek apakah email sudah terdaftar
          if (registeredUsers.some(user => user.email === formData.email)) {
            showError("Email sudah terdaftar. Silakan gunakan email lain.");
            registerButton.classList.remove("loading");
            return;
          }

          // Jika belum, simpan data user baru
          registeredUsers.push(formData);
          localStorage.setItem("registeredUsers", JSON.stringify(registeredUsers));
          window.location.href = "/login";
        });

        // Tampilkan pesan error
        function showError(message) {
          const errorElement = document.createElement("div");
          errorElement.className = "error-message";
          errorElement.style.color = "red";
          errorElement.textContent = message;
          document.getElementById("registerForm").appendChild(errorElement);
          setTimeout(() => errorElement.remove(), 3000);
        }
      });
    </script>
  </body>
</html>
