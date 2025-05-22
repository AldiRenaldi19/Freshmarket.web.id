<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Fresh Market</title>
  <script src="https://accounts.google.com/gsi/client" async defer></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 128, 0, 0.4)),
        url("https://images.unsplash.com/photo-1597362925123-77861d3fbac7?auto=format&fit=crop&q=80");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .container {
      background: rgba(255, 255, 255, 0.95);
      padding: 30px;
      border-radius: 12px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    h1, h2, p {
      text-align: center;
      margin-bottom: 15px;
      color: #2e7d32;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #333;
      font-weight: bold;
    }

    input {
      width: 100%;
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 14px;
    }

    .login-btn {
      width: 100%;
      padding: 10px;
      background-color: #2e7d32;
      color: white;
      border: none;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 10px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .loading-spinner {
      display: none;
      width: 18px;
      height: 18px;
      border: 3px solid white;
      border-top: 3px solid transparent;
      border-radius: 50%;
      animation: spin 1s linear infinite;
      margin-left: 10px;
    }

    .login-btn.loading .btn-text {
      display: none;
    }

    .login-btn.loading .loading-spinner {
      display: inline-block;
    }

    .options {
      margin-top: 15px;
      text-align: center;
      font-size: 14px;
    }

    .options a {
      color: #2e7d32;
      text-decoration: none;
    }

    .g_id_signin {
      margin-top: 20px;
      display: flex;
      justify-content: center;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Fresh Market</h1>
    <h2>Selamat Datang Kembali</h2>
    <p>Silakan login untuk melanjutkan berbelanja</p>

    <form id="loginForm">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" required />
      </div>
      <div class="form-group">
        <label for="password">Kata Sandi</label>
        <input type="password" id="password" required />
      </div>
      <button type="submit" class="login-btn">
        <span class="btn-text">Masuk</span>
        <span class="loading-spinner"></span>
      </button>

      <div class="options">
        <div><a href="#">Lupa kata sandi?</a></div>
        <div>Belum punya akun? <a href="/register">Daftar di sini</a></div>
      </div>

      <!-- Google Sign-In -->
      <div id="g_id_onload"
        data-client_id="881877155799-ld46mlo4e6mqcn3sfstvrrb61gc5q312.apps.googleusercontent.com"
        data-callback="handleGoogleLogin"
        data-auto_prompt="false">
      </div>
      <div class="g_id_signin"
        data-type="standard"
        data-size="large"
        data-theme="outline"
        data-text="sign_in_with"
        data-shape="rectangular"
        data-logo_alignment="left">
      </div>
    </form>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const user = JSON.parse(localStorage.getItem("user"));
      if (user) {
        window.location.href = user.isAdmin ? "../admin/dashboard" : "/dasboard";
        return;
      }

      const loginForm = document.getElementById("loginForm");
      const loginBtn = document.querySelector(".login-btn");

      loginForm.addEventListener("submit", async function (e) {
        e.preventDefault();
        showLoading();

        try {
          const email = document.getElementById("email").value;
          const password = document.getElementById("password").value;
          const sessionData = {
            expiresAt: new Date().getTime() + 24 * 60 * 60 * 1000,
          };

          const hashedPassword = await hashPassword(password);
          const registeredUsers = JSON.parse(localStorage.getItem("registeredUsers")) || [];
          const user = registeredUsers.find((u) => u.email === email);

          if (user && user.isBlocked) {
            alert("Akun Anda telah diblokir. Silakan hubungi admin.");
            return;
          }

          if (email === "admin@freshmarket.com" && password === "admin123") {
            localStorage.setItem("user", JSON.stringify({
              name: "Admin",
              email: email,
              isAdmin: true,
              lastLogin: new Date().toISOString(),
            }));
            window.location.href = "/pages/admin/dashboard";
            return;
          }

          if (user && (await comparePassword(hashedPassword, user.password))) {
            localStorage.setItem("userSession", JSON.stringify({ ...user, ...sessionData }));
            localStorage.setItem("user", JSON.stringify({
              name: user.name,
              email: user.email,
              phone: user.phone,
              isAdmin: false,
              lastLogin: new Date().toISOString(),
            }));
            window.location.href = "/";
          } else {
            alert("Email atau kata sandi salah!");
          }
        } catch (error) {
          alert("Login gagal: " + error.message);
        } finally {
          hideLoading();
        }
      });

      function showLoading() {
        loginBtn.classList.add("loading");
      }

      function hideLoading() {
        loginBtn.classList.remove("loading");
      }
    });

    function handleGoogleLogin(response) {
      const credential = response.credential;
      const payload = JSON.parse(atob(credential.split('.')[1]));
      const user = {
        name: payload.name,
        email: payload.email,
        isAdmin: false,
        lastLogin: new Date().toISOString(),
      };
      localStorage.setItem("user", JSON.stringify(user));
      localStorage.setItem("userSession", JSON.stringify({
        ...user,
        expiresAt: new Date().getTime() + 24 * 60 * 60 * 1000,
      }));
      if (user.isAdmin) {
        window.location.href = "pages/admin/dashboard";
      } else {
        window.location.href = "pages/user/dashboard";
      }
    }

    async function hashPassword(password) {
      const encoder = new TextEncoder();
      const data = encoder.encode(password);
      const hashBuffer = await crypto.subtle.digest('SHA-256', data);
      const hashArray = Array.from(new Uint8Array(hashBuffer));
      return hashArray.map(b => b.toString(16).padStart(2, '0')).join('');
    }

    async function comparePassword(inputHash, savedHash) {
      return inputHash === savedHash;
    }
  </script>
</body>
</html>
