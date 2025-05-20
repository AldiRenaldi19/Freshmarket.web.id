function logout() {
  localStorage.removeItem("user");
  window.location.href = "/login";
}

function checkAuth() {
  const user = JSON.parse(localStorage.getItem("user"));
  if (!user) {
    window.location.href = "/login";
    return null;
  }
  return user;
}

function checkAdminAuth() {
  const user = checkAuth();
  if (!user || !user.isAdmin) {
    alert("Anda tidak memiliki akses ke halaman ini!");
    window.location.href = "/login";
    return null;
  }
  return user;
}
function checkUserAuth() {
  const user = checkAuth();
  if (!user) {
    alert("Silakan login terlebih dahulu");
    window.location.href = "/login";
    return null;
  }
  return user;
}
function showNotification(message) {
  const notification = document.createElement("div");
  notification.className = "notification";
  notification.innerText = message;

  document.body.appendChild(notification);

  setTimeout(() => {
    notification.remove();
  }, 3000);
}

// Fungsi untuk mengecek sesi login
function checkSession() {
  const session = JSON.parse(localStorage.getItem("userSession"));

  if (!session) {
    logout();
    return false;
  }

  if (new Date().getTime() > session.expiresAt) {
    logout();
    notificationSystem.show("Sesi Anda telah berakhir. Silakan login kembali");
    return false;
  }

  return true;
}

// Fungsi untuk mendapatkan path login yang benar
function getLoginPath() {
  const currentPath = window.location.pathname;
  if (currentPath.includes("/pages/admin")) {
    return "/login";
  }
  return currentPath.includes("/pages/user/") ? "/login" : "/login";
}

// Fungsi untuk mengecek akses admin
function checkAdminAccess() {
  const user = JSON.parse(localStorage.getItem("user"));
  if (!user || !user.isAdmin) {
    alert("Anda tidak memiliki akses ke halaman admin");
    window.location.href = "/login";
    return false;
  }
  return true;
}

// Fungsi untuk mengecek akses user
function checkUserAccess() {
  const user = JSON.parse(localStorage.getItem("user"));
  if (!user) {
    alert("Silakan login terlebih dahulu");
    window.location.href = "/login";
    return false;
  }
  return true;
}

// Fungsi untuk kembali ke dashboard
function backToDashboard() {
  const user = JSON.parse(localStorage.getItem("user"));
  if (!user) {
    window.location.href = "/login";
    return;
  }

  if (user.isAdmin) {
    window.location.href = "/pages/admin/dashboard";
  } else {
    window.location.href = "/pages/user/dashboard";
  }
}

// Fungsi untuk memuat navbar
function loadUserNavbar() {
  const user = JSON.parse(localStorage.getItem("user"));
  // Cek apakah navbar sudah ada
  if (document.querySelector(".navbar")) return;

  const navbar = `
        <nav class="navbar">
            <div class="nav-left">
                <button class="mobile-menu-btn" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="/" class="home-btn">
                    <i class="fas fa-home"></i> <span>Beranda Utama</span>
                </a>
            </div>
            <div class="nav-right">
                <span class="user-name" id="userNameHeader">${user.name}</span>
                <button onclick="logout()" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> <span>Keluar</span>
                </button>
            </div>
        </nav>
        <div class="sidebar-overlay" onclick="toggleSidebar()"></div>
    `;

  document.body.insertAdjacentHTML("afterbegin", navbar);
}

// Fungsi untuk memuat sidebar
function loadUserSidebar() {
  const user = JSON.parse(localStorage.getItem("user"));
  const currentPath = window.location.pathname;
  // Cek apakah sidebar sudah ada
  if (document.querySelector(".user-sidebar")) return;

  const sidebar = `
        <div class="user-sidebar">
            <div class="user-logo" onclick="goToHomePage()" style="cursor: pointer">
                <img src="/assets/images/logo.png" alt="Fresh Market Logo" />
                <h2>Fresh Market</h2>
            </div>
            <div class="user-info">
                <i class="fas fa-user-circle"></i>
                <span id="userSideName">${user.name}</span>
            </div>
            <ul class="menu">
                <li class="${
                  currentPath.includes("/pages/user/dashboard") ? "active" : ""
                }">
                    <a href="/pages/user/dashboard"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li class="${
                  currentPath.includes("/pages/user/products") ? "active" : ""
                }">
                    <a href="/pages/user/products"><i class="fas fa-shopping-basket"></i> Produk</a>
                </li>
                <li class="${
                  currentPath.includes("/pages/user/orders") ? "active" : ""
                }">
                    <a href="/pages/user/orders"><i class="fas fa-shopping-bag"></i> Pesanan Saya</a>
                </li>
                <li class="${
                  currentPath.includes("/pages/user/profile") ? "active" : ""
                }">
                    <a href="/pages/user/profile"><i class="fas fa-user"></i> Profil</a>
                </li>
                <li class="${
                  currentPath.includes("/pages/user/wishlist") ? "active" : ""
                }">
                    <a href="/pages/user/wishlist"><i class="fas fa-heart"></i> Wishlist</a>
                </li>
                <li class="${
                  currentPath.includes("/pages/user/address") ? "active" : ""
                }">
                    <a href="/pages/user/address"><i class="fas fa-map-marker-alt"></i> Alamat</a>
                </li>
                <li>
                    <a href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Keluar</a>
                </li>
            </ul>
        </div>
    `;

  document
    .querySelector(".dashboard-container")
    .insertAdjacentHTML("afterbegin", sidebar);
}

// Fungsi untuk toggle sidebar pada perangkat mobile
function toggleSidebar() {
  const sidebar =
    document.querySelector(".user-sidebar") ||
    document.querySelector(".admin-sidebar");
  const overlay = document.querySelector(".sidebar-overlay");

  if (sidebar && overlay) {
    sidebar.classList.toggle("active");
    overlay.classList.toggle("active");
  }
}

// Deteksi ukuran layar dan terapkan kelas yang sesuai
window.addEventListener("resize", function () {
  const sidebar =
    document.querySelector(".user-sidebar") ||
    document.querySelector(".admin-sidebar");
  const overlay = document.querySelector(".sidebar-overlay");

  if (window.innerWidth > 768) {
    if (sidebar && sidebar.classList.contains("active")) {
      sidebar.classList.remove("active");
    }
    if (overlay && overlay.classList.contains("active")) {
      overlay.classList.remove("active");
    }
  }
});

// Fungsi yang konsisten untuk kembali ke homepage
function goToHomePage() {
  window.location.href = "/";
}

// Tambahkan ke setiap halaman yang membutuhkan auth
document.addEventListener("DOMContentLoaded", function () {
  if (!checkSession()) {
    window.location.href = "/login";
    return;
  }
  // lanjutkan load halaman
});
