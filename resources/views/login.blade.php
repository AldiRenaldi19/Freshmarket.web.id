<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Fresh Market</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <link rel="stylesheet" href="/css/styles.css" />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
      }

      body {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(46, 125, 50, 0.7)),
          url("https://images.unsplash.com/photo-1597362925123-77861d3fbac7?auto=format&fit=crop&q=80");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        padding: 20px;
        animation: slowZoom 20s infinite alternate;
        overflow: hidden;
        color: #fff;
        text-align: left;
        font-size: 1.2rem;
        line-height: 1.5;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
      }

      .login-container {
        background: rgba(255, 255, 255, 0.9);
        padding: 3rem 2rem;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        backdrop-filter: blur(10px);
        transform: translateY(0);
        transition: transform 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        animation: fadeIn 0.5s ease-in-out;
      }

      .login-container:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
      }

      .logo {
        text-align: center;
        margin-bottom: 2.5rem;
      }

      .logo h1 {
        color: #fff;
        font-size: 2.2rem;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 4px rgba(12, 10, 10, 0.1);
      }

      .logo p {
        color: #fff;
        font-size: 0.9rem;
      }

      .form-group {
        margin-bottom: 1.5rem;
        position: relative;
      }

      label {
        display: block;
        margin-bottom: 0.5rem;
        color: #fff;
        font-size: 0.9rem;
        font-weight: 500;
      }

      input {
        width: 100%;
        padding: 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.9);
      }

      input:focus {
        border-color: #fff;
        outline: none;
        box-shadow: 0 0 0 3px rgba(46, 125, 50, 0.1);
      }

      .login-btn {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, #2e7d32 0%, #1b5e20 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 1rem;
      }

      .login-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(63, 179, 69, 0.3);
      }

      .login-btn:active {
        transform: translateY(0);
      }

      .options {
        text-align: center;
        margin-top: 1.5rem;
      }

      .forgot-password {
        display: inline-block;
        margin-right: 1rem;
      }

      .forgot-password a {
        color: #fff;
        text-decoration: none;
        font-size: 0.9rem;
        transition: color 0.3s ease;
      }

      .forgot-password a:hover {
        color: #fff;
        text-decoration: underline;
      }

      .register-link {
        display: inline-block;
      }

      .register-link p {
        color: #666;
        font-size: 0.9rem;
      }

      .register-link a {
        color: #2e7d32;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
      }

      .register-link a:hover {
        color: #1b5e20;
        text-decoration: underline;
      }

      /* Animasi loading untuk tombol */
      .login-btn.loading {
        background: linear-gradient(135deg, #2e7d32 0%, #1b5e20 100%);
        pointer-events: none;
        position: relative;
        overflow: hidden;
      }

      .login-btn.loading::after {
        content: "";
        position: absolute;
        left: -100%;
        top: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(
          90deg,
          transparent 0%,
          rgba(255, 255, 255, 0.2) 50%,
          transparent 100%
        );
        animation: loading 1.5s infinite;
      }

      @keyframes loading {
        0% {
          left: -100%;
        }
        100% {
          left: 100%;
        }
      }

      /* Responsive Design */
      @media (max-width: 480px) {
        .login-container {
          padding: 2rem 1.5rem;
          width: 90%;
          max-width: 100%;
          margin: 0 auto;
          box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
          border-radius: 10px;
          animation: fadeIn 0.5s ease-in-out;
        }

        .logo h1 {
          font-size: 1.8rem;
          margin-bottom: 1rem;
        }
      }

      /* Menambahkan animasi parallax sederhana */
      @keyframes slowZoom {
        0% {
          background-size: 100%;
        }
        100% {
          background-size: 110%;
        }
      }

      /* Alternatif background jika gambar utama gagal dimuat */
      @media (max-width: 768px) {
        body {
          background: linear-gradient(
              rgba(0, 0, 0, 0.6),
              rgba(46, 125, 50, 0.8)
            ),
            url("https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&q=80");
          background-size: cover;
          background-position: center;
          animation: none;
        }
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

      .login-btn.loading .btn-text {
        visibility: hidden;
      }

      .login-btn.loading .loading-spinner {
        display: block;
      }

      .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
      }

      .error-message {
        color: #dc3545;
        font-size: 12px;
        margin-top: 4px;
        display: block;
      }

      .login-btn {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
      }

      .login-btn:disabled {
        background: #ccc;
        cursor: not-allowed;
      }

      .login-btn.loading .button-text {
        visibility: hidden;
      }

      .login-btn.loading .loading-spinner {
        display: block;
        position: absolute;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="left-side">
        <h1>Fresh Market</h1>
        <h2>Selamat Datang Kembali</h2>
        <p>Silakan login untuk melanjutkan berbelanja</p>
      </div>
      <div class="right-side">
        <form id="loginForm" novalidate>
          <h1>Masuk</h1>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" required />
            <small class="error-message"></small>
          </div>
          <div class="form-group">
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" required />
            <small class="error-message"></small>
          </div>
          <button type="submit" class="login-btn" id="loginButton">
            <span class="btn-text">Masuk</span>
            <span class="loading-spinner"></span>
          </button>
          <div id="loginError" class="error-message" style="margin-top: 10px;"></div>
          </div>
          <div class="form-group">
            <label for="rememberMe">
              <input type="checkbox" id="rememberMe" />
              Ingat saya
            </label>
          </div>
          <div class="form-group">
            <button type="submit" class="login-btn-google">
              <i class="fab fa-google"></i>
              Masuk dengan Google
              <style>
                .login-btn-google {
                  background-color: #4285f4;
                  color: white;
                  border: none;
                  padding: 10px 20px;
                  border-radius: 5px;
                  cursor: pointer;
                  display: flex;
                  align-items: center;
                }

                .login-btn-google i {
                  margin-right: 8px;
                }
                .login-btn-google:hover {
                  background-color: #357ae8;
                }
                .login-btn-google:active {
                  background-color: #3367d6;
                }
                .login-btn-google:disabled {
                  background-color: #ccc;
                  cursor: not-allowed;
                }
                .login-btn-google.loading {
                  background-color: #ccc;
                  cursor: not-allowed;
                }
                .login-btn-google.loading .btn-text {
                  visibility: hidden;
                }
                .login-btn-google.loading .loading-spinner {
                  display: block;
                }
                .login-btn-google .loading-spinner {
                  display: none;
                }
                .login-btn-google.loading .btn-text {
                  visibility: hidden;
                }
                .login-btn-google.loading .loading-spinner {
                  display: block;
                }
                .login-btn-google .loading-spinner {
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
                </style>
                <script>
                  document.addEventListener("DOMContentLoaded", function () {
                    const loginBtnGoogle = document.querySelector(".login-btn-google");
                    loginBtnGoogle.addEventListener("click", function () {
                      loginBtnGoogle.classList.add("loading");
                      setTimeout(() => {
                        loginBtnGoogle.classList.remove("loading");
                      }, 2000);
                    });
                  });
                </script>
            </button>
          </div>
          <div class="options">
            <div class="forgot-password">
              <a href="#">Lupa kata sandi?</a>
            </div>
            <div class="register-link">
              <p>Belum punya akun? <a href="/register">Daftar di sini</a></p>
            </div>
          </div>
        </form>
      </div>
    </div>

    <script src="/js/init.js"></script>
    <script src="/js/auth.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Fungsi untuk mengecek apakah halaman saat ini adalah halaman login
        function isLoginPage() {
          return window.location.pathname.includes('/login');
        }
        
        // Fungsi untuk redirect berdasarkan role
        function redirectBasedOnRole(user) {
          if (!isLoginPage()) return; // Hanya redirect jika di halaman login
          
          const adminPath = '/pages/admin/dashboard';
          const userPath = '/pages/user/dashboard';
          
          if (user.isAdmin) {
            window.location.replace(adminPath);
          } else {
            window.location.replace(userPath);
          }
        }
        
        // Cek status login hanya jika di halaman login
        const user = JSON.parse(localStorage.getItem('user'));
        if (user && isLoginPage()) {
          redirectBasedOnRole(user);
          return;
        }
        
        const loginForm = document.getElementById('loginForm');
        const loginButton = document.getElementById('loginButton');
        const loginError = document.getElementById('loginError');
        
        function showLoading() {
          loginButton.classList.add('loading');
          loginButton.disabled = true;
        }
        
        function hideLoading() {
          loginButton.classList.remove('loading');
          loginButton.disabled = false;
        }
        
        function showError(message) {
          loginError.textContent = message;
          loginError.style.display = 'block';
        }
        
        function clearError() {
          loginError.textContent = '';
          loginError.style.display = 'none';
        }
        
        if (loginForm) {
          loginForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            clearError();
            
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            
            if (!email || !password) {
              showError('Email dan kata sandi harus diisi');
              return;
            }
            
            showLoading();
            
            try {
              // Cek admin login
              if (email === 'admin@freshmarket.com' && password === 'admin123') {
                const adminData = {
                  name: 'Admin',
                  email: email,
                  isAdmin: true,
                  lastLogin: new Date().toISOString()
                };
                localStorage.setItem('user', JSON.stringify(adminData));
                window.location.replace('/pages/admin/dashboard');
                return;
              }
              // cek user login
              if (email === 'user@user.com' && password === 'user123') {
                const userData = {
                  name: 'User',
                  email: email,
                  isAdmin: false,
                  lastLogin: new Date().toISOString()
                };
                localStorage.setItem('user', JSON.stringify(userData));
                window.location.replace('/pages/user/dashboard');
                return;
              } else if (email === '' && password === '') {
                showError('Email dan kata sandi tidak boleh kosong');
                hideLoading();
                return;
              }
              // Cek user terdaftar
              const registeredUsers = JSON.parse(localStorage.getItem('registeredUsers')) || [];
              const registeredUser = registeredUsers.find(user => user.email === email);
              if (registeredUser) {
                if (registeredUser.password !== password) {
                  showError('Kata sandi salah');
                  hideLoading();
                  return;
                }
                
                const userData = {
                  name: registeredUser.name,
                  email: registeredUser.email,
                  phone: registeredUser.phone,
                  isAdmin: false,
                  lastLogin: new Date().toISOString()
                };
                
                localStorage.setItem('user', JSON.stringify(userData));
                window.location.replace('/pages/user/dashboard');
                return;
              }
              
              // Cek user biasa
              const users = JSON.parse(localStorage.getItem('registeredUsers')) || [];
              const user = users.find(u => u.email === email);
              
              if (!user) {
                showError('Email tidak terdaftar');
                hideLoading();
                return;
              }
              
              if (user.password !== password) {
                showError('Kata sandi salah');
                hideLoading();
                return;
              }
              
              const userData = {
                name: user.name,
                email: user.email,
                phone: user.phone,
                isAdmin: false,
                lastLogin: new Date().toISOString()
              };
              
              localStorage.setItem('user', JSON.stringify(userData));
              window.location.replace('/pages/user/dashboard');
              
            } catch (error) {
              console.error('Login error:', error);
              showError('Terjadi kesalahan saat login. Silakan coba lagi.');
              hideLoading();
            }
          });
        }
      });
    </script>
  </body>
</html>
